<?php
namespace App\Repositories;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class CompanyRepository
{
    /**
     * Mendapatkan daftar semua perusahaan dengan pagination.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllCompanies($perPage = 5)
    {
        return Company::paginate($perPage);
    }

    /**
     * Menyimpan data perusahaan baru.
     *
     * @param array $data
     * @return Company
     */
    public function createCompany(array $data): Company
    {
        return Company::create($data);
    }

    /**
     * Mengupdate data perusahaan.
     *
     * @param Company $company
     * @param array $data
     * @return bool
     */
    public function updateCompany(Company $company, array $data)
    {
        $company->update($data);
    }

    /**
     * Menghapus data perusahaan.
     *
     * @param Company $company
     * @return bool|null
     */
    public function deleteCompany(Company $company): ?bool
    {
        return $company->delete();
    }

    /**
     * Menyimpan logo perusahaan ke storage.
     *
     * @param $logoFile
     * @return string
     */
    public function storeLogo($logoFile): string
    {
        return $logoFile->store('company', 'public');
    }

    /**
     * Menghapus logo perusahaan dari storage.
     *
     * @param string $logoPath
     * @return void
     */
    public function deleteLogo(string $logoPath): void
    {
        Storage::delete('public/' . $logoPath);
    }
}

?>
