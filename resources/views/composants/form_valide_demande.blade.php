@if($projet['Titre du projet']['value'] !== null )


<div class="row gap-2">
    <div class="col-sm-4">
        <form action="{{ route('change_statut')}}" method="post">
        @csrf
            <input type="hidden" name="id_promoteur" value="{{ $id_promoteur }}">
            <input type="hidden" name="statut" value="{{ 'rejeter' }}">
            <input type="submit" class="btn btn-danger" value="Rejeter la demande">
        </form>
    </div>

    <div class="col-sm-4">
        <form action="{{route('change_statut')}}" method="post">
        @csrf
            <input type="hidden" name="id_promoteur" value="{{ $id_promoteur }}">
            <input type="hidden" name="statut" value="{{ 'valider' }}">
            <input type="submit" class="btn btn-success" value="Valider la demande">
        </form>
    </div>
</div>


@endif


