<!-- delete modal -->
<div id="delete_modal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                               colors="primary:#f7b84b,secondary:#f06548"
                               style="width:100px;height:100px"></lord-icon>

                    <h4 class="mt-4">Are you sure?</h4>
                    <p class="text-muted">Are you sure you want to delete <spam class="text-danger" id="delete_item_name"></spam>?</p>
                </div>

                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button class="btn btn-light" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" id="delete-confirm">Yes, Delete It!</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    async function commonDeleteFunction(deleteUrl, itemName = 'Item', button, closeView = false) {
        return new Promise((resolve) => {
            let resolved = false;

            $('#delete_item_name').text(itemName);
            $('#delete_modal').modal('show');

            $('#delete-confirm').off('click').on('click', async function () {
                try {
                    const response = await fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    const res = await response.json();
                    $('#delete_modal').modal('hide');

                    let icon = res.status ? 'success' : 'warning';
                    let msg = res.message;

                    commonAlert(icon, msg);

                    if (res.status && button) {
                        $(button).closest('tr').remove();
                    }

                    if (!resolved) {
                        resolved = true;
                        resolve(res.status);
                    }

                } catch (error) {
                    console.error(error);
                    commonAlert('error', 'Something went Wrong!');
                     if (!resolved) {
                        resolved = true;
                        resolve(false);
                    }
                }
            });

            $('#delete_modal').on('hidden.bs.modal', function () {
                 if (!resolved) {
                    resolved = true;
                    resolve(false);
                }
            });
        });
    }



    function commonAlert(icon, msg) {
        Swal.fire({
            position: "top-end",
            icon: icon,
            title: msg,
            showConfirmButton: false,
            timer: 2000,
            showCloseButton: true,

            customClass: {
                title: 'swal-title-small'
            },

        });
    }


</script>
@endpush
