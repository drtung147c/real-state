@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="bod">{{ trans('cruds.user.fields.bod') }}*</label>
                <input type="text" id="bod" name="bod" class="form-control date" value="{{ old('bod', isset($user) ? $user->bod : '') }}" required>
                @if($errors->has('bod'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bod') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.bod_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.user.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($user) ? $user->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($user) ? $user->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('job') ? 'has-error' : '' }}">
                <label for="job">{{ trans('cruds.user.fields.job') }}</label>
                <input type="text" id="job" name="job" class="form-control" value="{{ old('job', isset($user) ? $user->job : '') }}" required>
                @if($errors->has('job'))
                    <em class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.job_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="password_confirmation">{{ trans('cruds.user.fields.password_confirmation') }}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                @if($errors->has('password_confirmation'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_confirmation_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_super_admin') ? 'has-error' : '' }}">
                <label for="is_super_admin">{{ trans('cruds.user.fields.is_super_admin') }}</label>
                <input name="is_super_admin" type="hidden" value="0">
                <input value="1" type="checkbox" id="is_super_admin" name="is_super_admin" {{ old('is_super_admin', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('is_super_admin'))
                    <em class="invalid-feedback">
                        {{ $errors->first('is_super_admin') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.is_super_admin_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
