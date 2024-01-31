<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Administrador ou Usuário</h3>
    </div>
    <div class="card-body text-center">
        <input  type="checkbox"
            data-handle-width="100"
            id="perfil"
            name="perfil"
            data-onstyle="dark"
            data-offstyle="warning"
            value= "1", {{ $perfil == 1 ? 'checked' : 2  }}
        />
    </div>
</div>