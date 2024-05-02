<!-- Default Tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profil-tab{{ $index }}" data-bs-toggle="tab" data-bs-target="#profil{{ $index }}" type="button" role="tab" aria-controls="profil{{ $index }}" aria-selected="true">Profile</button>
    </li>
    @if(!empty($groupement_info))
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="groupement-tab{{ $index }}" data-bs-toggle="tab" data-bs-target="#groupement{{ $index }}" type="button" role="tab" aria-controls="groupement{{ $index }}" aria-selected="false">Groupement</button>
    </li>
    @endif
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="projet-tab{{ $index }}" data-bs-toggle="tab" data-bs-target="#projet{{ $index }}" type="button" role="tab" aria-controls="projet{{ $index }}" aria-selected="false">Demande</button>
    </li>
</ul>
<div class="tab-content pt-2" id="myTabContent">

    <div class="tab-pane fade show active" id="profil{{ $index }}" role="tabpanel" aria-labelledby="profil-tab{{ $index }}">
        <div class="container">
            <div class="row">
                @foreach ($profil as $key => $value)
                @if(in_array($key, ['CNI', 'CMU', 'Certificat de résidence']))
                <div class="col-sm-{{ $value['col'] }}">
                    <div class="input-wrapper">
                        {{$key}} : <a href="{{$value['value']}}">voir</a>
                    </div>
                </div>
                @else
                <div class="col-sm-{{ $value['col'] }}">
                    <div class="input-wrapper">
                        <input type="text" id="inputField" name="inputField" value="{{ $key }} : {{ $value['value'] }}" disabled>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="groupement{{ $index }}" role="tabpanel" aria-labelledby="groupement-tab{{ $index }}">
        <div class="container">
            <div class="row">
                @foreach ($groupement_info as $key => $value)
                @if(in_array($key, $docs))
                <div class="col-sm-{{ $value['col'] }}">
                    <div class="input-wrapper">
                        {{$key}} : <a href="{{$value['value']}}">voir</a>
                    </div>
                </div>
                @else
                <div class="col-sm-{{ $value['col'] }}">
                    <div class="input-wrapper">
                        <input type="text" id="inputField" name="inputField" value="{{ $key }} : {{ $value['value'] }}" disabled>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="projet{{ $index }}" role="tabpanel" aria-labelledby="Projet-tab{{ $index }}">
        <div class="container">
            <div class="row">
                @foreach ($projet as $key => $value)
                <div class="col-sm-{{ $value['col'] }}">
                    <div class="input-wrapper">
                        <input type="text" id="inputField" name="inputField" value="{{ $key }} : {{ $value['value'] }}" disabled>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div><!-- End Default Tabs -->



