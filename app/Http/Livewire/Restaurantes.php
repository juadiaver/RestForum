<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Restaurante;
use Illuminate\Support\Facades\Auth;

class Restaurantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $user_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.restaurantes.view', [
            'restaurantes' => Restaurante::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Restaurante::create([
			'nombre' => $this-> nombre,
			'user_id' => Auth::user()->id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Restaurante creado correctamente');
    }

    public function edit($id)
    {
        $record = Restaurante::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->user_id = $record-> user_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',

        ]);

        if ($this->selected_id) {
			$record = Restaurante::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
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
