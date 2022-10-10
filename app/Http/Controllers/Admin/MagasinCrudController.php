<?php


namespace App\Http\Controllers\Admin;

use App\Http\Requests\MagasinRequest;
use App\Models\Magasin;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MagasinCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    public function setup()
    {
        $this->data['shop'] = Magasin::find(1);
    }

    protected function setupListOperation()
    {
        $this->crud->setListView('crud::shop');
    }

    public function updateShop(MagasinRequest $request)
    {

        $data = $request->validated();
        $disk = "uploads";
        $destination_path = "uploads/shop";
        $path = '/SandFishBack/public/uploads/shop/';
        if (request()->hasFile('logo')) {
            $imageName = Str::random(15) . '.' . $request->logo->getClientOriginalExtension();
            $request->file('logo')->storeAs($destination_path, $imageName, $disk);
            $data['logo'] = $path . $imageName;
        }
        if ($request->website_under_maintenance){
            $data['website_under_maintenance'] = 1;
        }else{
            $data['website_under_maintenance'] = 0;
        }
        Magasin::where('id', 1)->update($data);
        \Alert::add('success', "L’élément a été modifier avec succès.")->flash();
        return redirect()->back();
    }
}
