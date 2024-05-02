<!-- The Modal -->
<div class="modal fade" id="newcampagne">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    Nouvelle campagne
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('newcampagne')}}" method="post" id="myForm" class="ajax-form">

                    @csrf
                    <div class="row">

                        <div class="mb-4">
                            <label for="objet">Objet</label>
                            <input type="text" name="objet" id="objet" class="form-control" placeholder="Objet" required>
                            @error('objet')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="objet">Message</label>
                            @error('message')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!-- Quill Editor Default -->
                            <div id="editor">

                            </div>
                            <!-- End Quill Editor Default -->
                        </div>

                        <input type="hidden" name="message" id="quillContent" required>

                        <div class="mt-4"><br><br>
                            <input type="submit" value="Enrgistrer" class="btn btn-primary">
                        </div>

                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



