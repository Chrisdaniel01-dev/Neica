@extends('admin.layouts.admin')

@section('title', 'Détail du message')

@section('content')

<section class="page-content page-content--wide">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <div>
                <h2>{{ $message->subject }}</h2>

                <small>
                    Reçu {{ $message->created_at->format('d/m/Y à H:i') }}
                </small>
            </div>

            <div>

                <a href="{{ route('admin.messages.index') }}"
                   class="btn btn-secondary">
                    Retour
                </a>

            </div>

        </div>

        <div class="card-body">

            <div class="mb-4">

                <h4>Expéditeur</h4>

                <p>
                    <strong>Nom :</strong>
                    {{ $message->name }}
                </p>

                <p>
                    <strong>Email :</strong>
                    <a href="mailto:{{ $message->email }}">
                        {{ $message->email }}
                    </a>
                </p>

            </div>

            <hr>

            <div class="message-content">

                <h4>Message</h4>

                <p style="white-space: pre-line;">
                    {{ $message->message }}
                </p>

            </div>

        </div>

        <div class="card-footer d-flex gap-2">

            <form action="{{ route('admin.messages.destroy', $message) }}"
                  method="POST"
                  onsubmit="return confirm('Supprimer ce message ?')">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn--secondary" style="height: 40px; background-color : red;">
                    Supprimer
                </button>

            </form>

        </div>

    </div>

</section>

@endsection