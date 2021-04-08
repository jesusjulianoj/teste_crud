<?php
if($qtdCidade > 0){ ?>
    <label>Cidade</label>
    <select class="form-control" name="cidade" id="cidade">
        @foreach($lista_cidades as $lsCidade)
            <option value="{{$lsCidade->id}}">{{$lsCidade->desc_cidade}}</option>
        @endforeach
    </select><?php
} else {
    echo("");
}?>