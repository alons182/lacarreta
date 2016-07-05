<div class="col-lg-6">
    <section class="panel">
        <header class="panel-heading">
                    <input class="btn btn-primary" type="submit" value="{{ isset($buttonText) ? $buttonText : 'Crear Usuario' }}">
                    <a href="{{ URL::route('admin.users.index') }}" class="btn btn-default">Cancel</a>
         </header>
        <div class="panel-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nombre</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ isset($user) ? $user->name : '' }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" value="">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Role</label>

                <div class="col-md-6">
                    
                    <select name="role" id="role" class="form-control" >
                        <option value="1" {{ (isset($user)) ? $user->roles->first()->id == 1 ? 'selected' : '' : ''  }}>Administrador</option>
                        <option value="2" {{ (isset($user)) ? $user->roles->first()->id == 2 ? 'selected' : '' : ''  }}>Cliente</option>
                    </select>
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            
        </div>
    </section>
</div>