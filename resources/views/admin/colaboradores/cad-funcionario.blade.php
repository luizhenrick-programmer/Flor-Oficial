<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@extends('admin.app')

@section('titulo', 'Cadastrar Funcionário')

@section('content')
<div class="container-xl py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cadastro de Colaboradores</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.cad-funcionario') }}" method="POST">
                @csrf
                <h5 class="fw-bold text-success mb-4">Dados Pessoais</h5>
                <!-- Nome Completo -->
                <div class="mb-3">
                    <label for="nomeCompleto" class="form-label ms-2">Nome Completo</label>
                    <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Ex: João Silva" required>
                </div>

                <!-- CPF e RG -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpf" class="form-label ms-2">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required oninput="formatarCPF(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="rg" class="form-label ms-2">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite apenas números do RG" required>
                    </div>
                </div>

                <!-- Cargo -->
                <div class="mb-3">
                    <label for="cargo" class="form-label ms-2">Cargo</label>
                    <select class="form-select" id="cargo" name="cargo" required>
                        <option value="">Selecione o cargo</option>
                        <option value="admin">Administrador</option>
                        <option value="gerente">Gerente</option>
                        <option value="vendedor">Vendedor</option>
                    </select>
                </div>

                <!-- E-mail e Telefone -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label ms-2">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nome@empresa.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone" class="form-label ms-2">Telefone</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                    </div>
                </div>

                <!-- Endereço -->
                <h5 class="fw-bold text-success mb-4">Endereço</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cep" class="form-label ms-2">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="Insira o CEP" maxlength="10" onblur="pesquisacep(this.value);" required>
                    </div>
                    <div class="col-md-6">
                        <label for="rua" class="form-label ms-2">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite a rua" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="numero" class="form-label ms-2">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite a numeração da residência" required>
                    </div>
                    <div class="col-md-6">
                        <label for="bairro" class="form-label ms-2">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cidade" class="form-label ms-2">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex: São Paulo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade" class="form-label ms-2">Estado</label>
                        <input type="text" class="form-control" id="uf" name="estado" placeholder="Ex: São Paulo" required>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary me-2">Limpar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function formatarCPF(campo) {
        let cpf = campo.value.replace(/\D/g, '');
        if (cpf.length > 11) cpf = cpf.slice(0, 11);
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        campo.value = cpf;
    }
</script>
@endsection
