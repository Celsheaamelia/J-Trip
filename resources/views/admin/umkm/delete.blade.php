<form action="{{ route('admin.umkm.destroy', $umkm->id_umkm) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger"
        onclick="return confirm('Yakin ingin menghapus UMKM ini?')">
        Hapus
    </button>
</form>