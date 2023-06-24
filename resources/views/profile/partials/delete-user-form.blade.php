<section>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Delete Account</h4>
                <p>
                    Setelah akun Anda dihapus, semua sumber daya dan data yang terkait akan dihapus secara permanen.
                    Sebelum menghapus akun Anda, harap pastikan untuk mengunduh semua data atau informasi yang ingin
                    Anda simpan.
                </p>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                    Hapus Akun
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('profile.destroy') }}">
                                <div class="modal-body">
                                    @csrf
                                    @method('delete')
                                    <p>
                                        Setelah akun Anda dihapus, semua sumber daya dan data yang terkait akan dihapus
                                        secara permanen. Harap masukkan Password Anda untuk mengonfirmasi bahwa Anda
                                        ingin menghapus akun Anda secara permanen.
                                    </p>
                                    <p class="font-weight-bold mt-2" style="font-size: 18px;">Konfirmasi Password</p>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-danger mr-2">Hapus Akun
                                        Permanen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
