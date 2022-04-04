<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Restaurante;
use Illuminate\Support\Facades\Auth;


class Restaurantes extends Component
{
    use WithPagination;
    use WithFileUploads;
	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $user_id, $imagen, $descripcion, $mesas;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.restaurantes.view', [
            'restaurantes' => Restaurante::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
						->orWhere('imagen', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('mesas', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->user_id = null;
		$this->imagen = null;
		$this->descripcion = null;
		$this->mesas = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'imagen' => 'required',
		'descripcion' => 'required',
		'mesas' => 'required',
        ]);
        
        //Guardamos la url remplazando la carpeta public para luego poder encontrarla desde la vista.

        $url =  str_replace("public/","",$this->imagen->store('public/Imagen-Restaurante'));

        Restaurante::create([ 
			'nombre' => $this-> nombre,
			'user_id' => Auth::user()->id,
			'imagen' => $url,
			'descripcion' => $this-> descripcion,
			'mesas' => $this-> mesas
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Restaurante Successfully created.');
    }

    public function edit($id)
    {
        $record = Restaurante::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->user_id = $record-> user_id;
		$this->imagen = $record-> imagen;
		$this->descripcion = $record-> descripcion;
		$this->mesas = $record-> mesas;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'user_id' => 'required',
		'imagen' => 'required',
		'descripcion' => 'required',
		'mesas' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Restaurante::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'user_id' => $this-> user_id,
			'imagen' => $this-> imagen,
			'descripcion' => $this-> descripcion,
			'mesas' => $this-> mesas
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Restaurante Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Restaurante::where('id', $id);
            $record->delete();
        }
    }
}
