<?php

namespace App\Policies;

use App\Models\Surat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuratPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Auth\Access\Response|bool
     */
   public function view(User $user, Surat $surat)
    {
        $recipient = $surat->surat_user->pluck('user_id')->toArray();
        
        return in_array($user->id, $recipient) || $surat->sender_id == $user->id || auth()->user()->level->jabatan = 'Admin';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $jabatan = ['Pegawai', 'Pimpro'];
       return in_array($user->level->jabatan, $jabatan);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Surat $surat)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Surat $surat)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Surat $surat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Surat $surat)
    {
        //
    }
}
