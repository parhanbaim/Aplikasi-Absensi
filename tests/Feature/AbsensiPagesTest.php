<?php

namespace Tests\Feature;

use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AbsensiPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_and_absensi_pages_can_render(): void
    {
        $this->get(route('siswa.index'))->assertOk();
        $this->get(route('absensi.index'))->assertOk();
    }

    public function test_absensi_can_be_saved_for_a_selected_student(): void
    {
        $siswa = Siswa::create([
            'name' => 'Budi Santoso',
            'kelas' => 'X IPA 1',
        ]);

        $response = $this->post(route('absensi.store'), [
            'siswa_id' => $siswa->id,
            'tanggal' => '2026-09-21',
            'status' => 'hadir',
        ]);

        $response->assertRedirect(route('absensi.index'));
        $this->assertDatabaseHas('absensis', [
            'siswa_id' => $siswa->id,
            'status' => 'hadir',
        ]);
    }

    public function test_absensi_rejects_an_unregistered_student_id(): void
    {
        $response = $this->from(route('absensi.create'))->post(route('absensi.store'), [
            'siswa_id' => 9999,
            'tanggal' => '2026-09-21',
            'status' => 'hadir',
        ]);

        $response->assertRedirect(route('absensi.create'));
        $response->assertSessionHasErrors('siswa_id');
        $this->assertDatabaseCount('absensis', 0);
    }
}
