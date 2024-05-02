


<!-- The Modal -->
<div class="modal fade" id="supp{{ $index +1 }}Modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Etes vous sure de vouloir supprimer le gestionnaire {{$gestionnaire->name}} ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{ route('suppGestionnaire') }}" method="post" class="form{{ $index +1 }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$gestionnaire -> id}}">
                    <input type="submit" value="Oui" class="btn btn-secondary">
                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>



