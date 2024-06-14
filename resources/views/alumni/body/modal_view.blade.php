<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                {{ __('Data Alumni') }}</h5>
            <button class="close" type="button" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">Nama
                        Alumni:</label>
                    <input value="{{ $data->name }}" type="text"
                        class="form-control" id="lead_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">NIM
                        Alumni:</label>
                    <input value="{{ $data->username }}" type="text"
                        class="form-control" id="lead_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">Email
                        Alumni:</label>
                    <input value="{{ $data->email }}" type="text"
                        class="form-control" id="lead_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">Nomor Telpon
                        Alumni:</label>
                    <input value="{{ $data->phone_number }}" type="text"
                        class="form-control" id="lead_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">Prodi
                        Alumni:</label>
                    <input
                        value="{{ $data->alumni != null ? $data->alumni->prodi : '-' }}"
                        type="text" class="form-control" id="lead_id"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">Jenjang
                        Alumni:</label>
                    <input
                        value="{{ $data->alumni != null ? $data->alumni->jenjang : '-' }}"
                        type="text" class="form-control" id="lead_id"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">Jenis Kelamin
                        Alumni:</label>
                    <input
                        value="{{ $data->alumni != null ? $data->alumni->jenis_kelamin : '-' }}"
                        type="text" class="form-control" id="lead_id"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id" class="col-form-label">Agama
                        Alumni:</label>
                    <input
                        value="{{ $data->alumni != null ? $data->alumni->agama : '-' }}"
                        type="text" class="form-control" id="lead_id"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id"
                        class="col-form-label">Angkatan:</label>
                    <input
                        value="{{ $data->alumni != null ? $data->alumni->tahun_masuk : '-' }}"
                        type="text" class="form-control" id="lead_id"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="lead_id"
                        class="col-form-label">Lulusan:</label>
                    <input
                        value="{{ $data->alumni != null ? $data->alumni->tahun_lulus : '-' }}"
                        type="text" class="form-control" id="lead_id"
                        readonly>
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button"
                data-dismiss="modal">{{ __('Cancel') }}</button>
            </form>
        </div>
    </div>
</div>
