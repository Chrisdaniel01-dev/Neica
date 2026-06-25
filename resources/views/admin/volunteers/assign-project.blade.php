@extends('admin.layouts.admin')

@section('title', 'Affecter un projet')

@section('content')

<div class="table-card">

    <h2>
        Affecter un projet à
        {{ $volunteer->name }}
    </h2>

    <form
        action="{{ route('admin.volunteers.assign-project.store', $volunteer) }}"
        method="POST"
    >
        @csrf

        <div class="form-group">

            <label>Choisir un projet</label>

            <select
                name="project_id"
                class="form-control"
                required
            >

                <option value="">
                    -- Sélectionner --
                </option>

                @foreach($projects as $project)

                    <option value="{{ $project->id }}">
                        {{ $project->title }}
                    </option>

                @endforeach

            </select>

        </div>

        <button
            type="submit"
            class="btn-profile btn-project"
        >
            Affecter
        </button>

    </form>

</div>

@endsection