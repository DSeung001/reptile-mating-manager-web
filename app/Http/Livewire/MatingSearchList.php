<?php

namespace App\Http\Livewire;

use App\Models\Mating;
use App\Models\Reptile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MatingSearchList extends Component
{
    // 뷰 property
    public $typeList, $maleReptilePluck, $femaleReptilePluck, $matingList;
    // 컴포넌트 property
    public $matherId, $fatherId, $typeId, $fatherSearchString, $matherSearchString;
    // 추가 property
    public $typeSelected, $fatherSelected, $matherSelected, $matingIdSelected;

    public function typeChange($typeId){
        if(isset($typeId)){
            $this->typeId = $typeId;
            $this->typeSelected = $typeId;
            $this->setMatingList();
        }
        $this->maleReptilePluck = $this->setReptileList('m', $this->fatherSearchString);
        $this->femaleReptilePluck = $this->setReptileList('f', $this->matherSearchString);
    }

    public function fatherSearch($searchString){
        $this->fatherSearchString = $searchString;
        $this->maleReptilePluck = $this->setReptileList('m', $searchString);
    }

    public function matherSearch($searchString){
        $this->matherSearchString = $searchString;
        $this->femaleReptilePluck = $this->setReptileList('f', $searchString);
    }

    private function setReptileList($gender, $searchString = ""){
        $list = Reptile::select('id', 'name');

        if (isset($this->typeId)) {
            $list = $list->where('type_id', $this->typeId);
        }

        return  $list->searchByName($searchString)
            ->listByUserId(Auth::id())
            ->conditionGender($gender)
            ->pluck('name', 'id');
    }

    public function fatherSelect($id = null){
        $this->fatherId = $id;
        $this->fatherSelected = $id;
        $this->setMatingList();
    }

    public function matherSelect($id = null){
        $this->matherId = $id;
        $this->matherSelected = $id;
        $this->setMatingList();
    }

    private function setMatingList(){

        $this->matingList = Mating::select(
            DB::raw("
                matings.id AS id,
                f_reptile.name AS father_name,
                m_reptile.name AS mather_name,
                mating_at,
                matings.created_at AS created_at,
                matings.updated_at AS updated_at
            "))
            ->leftJoin('reptiles AS f_reptile', 'matings.father_id', '=', 'f_reptile.id')
            ->leftJoin('reptiles AS m_reptile', 'matings.mather_id', '=', 'm_reptile.id')
            ->where('matings.user_id', Auth::id());

        if(!empty($this->typeId)){
            $this->matingList = $this->matingList->where('matings.type_id', $this->typeId);
        }

        if (!empty($this->fatherId)){
            $this->matingList = $this->matingList->where('matings.father_id', '=', $this->fatherId);
        }

        if (!empty($this->matherId)){
            $this->matingList = $this->matingList->where('matings.mather_id', '=', $this->matherId);
        }

        $this->matingList = $this->matingList->get();
    }

    public function render()
    {
        return view('livewire.mating-search-list');
    }
}
