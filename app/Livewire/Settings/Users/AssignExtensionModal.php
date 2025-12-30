<?php
namespace App\Livewire\Settings\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Extension;
use Illuminate\Support\Facades\DB;

class AssignExtensionModal extends Component
{
    public bool $open = false;
    public ?int $selectedUserId = null;
    public ?string $selectedExtension = null;

    protected $listeners = [
        'openAssignExtensionModal' => 'openModal',
    ];

    public function openModal()
    {
        $this->reset(['selectedUserId', 'selectedExtension']);
        $this->open = true;
    }

    public function assign()
    {
        $this->validate([
            'selectedUserId' => 'required|exists:pbx.users,id',
            'selectedExtension' => 'required|exists:call_server.exten,extension',
        ]);

        try {
            DB::connection('pbx')->beginTransaction();
            DB::connection('call_server')->beginTransaction();

            $user = User::findOrFail($this->selectedUserId);
            $user->update(['extension' => $this->selectedExtension]);

            Extension::where('extension', $this->selectedExtension)->update(['status' => 1]);

            DB::connection('pbx')->commit();
            DB::connection('call_server')->commit();

            $this->dispatch('refreshDatatable');
            $this->open = false;
            
            // Re-load the data for next time or if the modal stays open (though we close it)
            // But since we close it and reset on open, it's fine.

        } catch (\Exception $e) {
            DB::connection('pbx')->rollBack();
            DB::connection('call_server')->rollBack();
            throw $e;
        }
    }

    public function render()
    {
        // Users who have no extension
        $usersWithoutExtension = User::whereNull('extension')
            ->orWhere('extension', '')
            ->get();

        // Unassigned extensions
        $unassignedExtensions = Extension::where('status', 0)->get();

        return view('livewire.settings.users.assign-extension-modal', [
            'users' => $usersWithoutExtension,
            'extensions' => $unassignedExtensions,
        ]);
    }
}
