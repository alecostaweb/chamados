@can('admin')

<div class="row">
    <div class="col-sm form-group">
        <label for="atribuido_para"><b>Atribuir para:</b></label>
        <select name="atribuido_para" class="form-control">
            <option value="" selected="">Escolher</option>

            @foreach($chamado->fila->users as $atendente)
            @if(old('atribuido_para') == '' and isset($chamado->atribuido_para))
            <option value="{{ $atendente->codpes }}" {{ ( $chamado->atribuido_para == $atendente->codpes) ? 'selected' : ''}}>
                {{ $atendente->name }}
            </option>
            @else
            <option value="{{ $atendente->codpes }}" {{ (old('atribuido_para') == $atendente->codpes) ? 'selected' : ''}}>
                {{ $atendente->name }}
            </option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="col-sm form-group">
        <label for="complexidade"><b>Complexidade:</b></label>
        <select name="complexidade" class="form-control">
            <option value="" selected="">Escolher</option>
            @foreach($complexidades as $complexidade)
            @if(old('complexidade') == '' and isset($chamado->complexidade))
            <option value="{{ $complexidade }}" {{ ( $chamado->complexidade == $complexidade) ? 'selected' : ''}}>
                {{ $complexidade }}
            </option>
            @else
            <option value="{{ $complexidade }}" {{ (old('complexidade') == $complexidade) ? 'selected' : ''}}>
                {{ $complexidade }}
            </option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="col-sm form-group">
        <label for="nome"><b>Número USP do(a) requisitante:</b></label>
        <input class="form-control" id="codpes" name="codpes" value="{{ $chamado->user->codpes ?? old('codpes') }}">
        <small id="codpesHelp" class="form-text text-muted">Exemplo: 123456</small>
    </div>

</div>
@endcan

<div class="row">
    <div class="col-sm form-group">
        <label for="nome"><b>Seu telefone ou ramal:</b></label>
        <input class="form-control" id="telefone" name="telefone" value="{{ Auth::user()->telefone ?? old('telefone') }}">
        <small id="telefoneHelp" class="form-text text-muted">Exemplo: 3091-4616 ou 914616</small>
    </div>

    <div class="col-sm form-group">
        <label for="predio"><b>Prédio:</b></label>
        <select name="predio" class="form-control">
            <option value="" selected="">Escolha uma prédio</option>
            @foreach($predios as $predio)
            @if(old('predio')=='' and isset($chamado->predio))
            <option value="{{ $predio }}" {{ ( $chamado->predio == $predio) ? 'selected' : ''}}>
                {{ $predio }}
            </option>
            @else
            <option value="{{ $predio }}" {{ (old('predio') == $predio) ? 'selected' : ''}}>
                {{ $predio }}
            </option>
            @endif
            @endforeach()
        </select>
    </div>

    <div class="col-sm form-group">
        <label for="nome"><b>Sala:</b></label>
        <input class="form-control" id="sala" name="sala" value="{{ $chamado->sala ?? old('sala') }}">
        <small id="salaioHelp" class="form-text text-muted">Exemplo: sala 02</small>
    </div>
</div>


<div class="form-group">
    <label for="nome"><b>Patrimônio do computador:</b></label>
    <input class="form-control" id="patrimonio" name="patrimonio" value="{{ $chamado->patrimonio ?? old('patrimonio') }}">
    <small id="patrimonioHelp" class="form-text text-muted">Exemplo: <b>008.047977</b> <br>
        Use vírgula, caso o procedimento de atendimento seja idêntico para múltiplos computadores. Exemplo: <b>008.047977,008.048593</b>
    </small>
</div>

<div class="form-group">
    @foreach($form as $element)
    {{ $element }}<br>
    @endforeach
</div>

<div class="form-group">
    <label for="chamado"><b>Chamado:</b></label>
    <textarea class="form-control" id="chamado" name="chamado" rows="4">{{ $chamado->chamado ?? old('chamado') }}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
