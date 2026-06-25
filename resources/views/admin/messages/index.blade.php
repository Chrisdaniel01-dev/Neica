@extends('admin.layouts.admin')

@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Messages')

@section('content')
<section class="page-content page-content--wide">

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="message-list">

        @forelse($messages as $message)

            <div class="message-item {{ !$message->is_read ? 'message-item--unread' : '' }}">

                <div class="message-item__avatar">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>

                <div class="message-item__content">

                    <div class="message-item__header">

                        <span class="message-item__name">
                            {{ $message->name }}
                        </span>

                        <span class="message-item__time">
                            {{ $message->created_at->diffForHumans() }}
                        </span>

                    </div>

                    <div class="message-item__subject">

                        @if(!$message->is_read)
                            <span class="badge badge-danger">Nouveau</span>
                        @endif

                        {{ $message->subject }}

                    </div>

                    <div class="message-item__preview">
                        {{ Str::limit($message->message, 120) }}
                    </div>

                    <div class="mt-3 d-flex gap-2">

                        <a href="{{ route('admin.messages.show', $message) }}"
                           class="btn btn--primary">
                            Lire
                        </a>

                        <form action="{{ route('admin.messages.destroy', $message) }}"
                              method="POST"
                              onsubmit="return confirm('Supprimer ce message ?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn--secondary">
                                Supprimer
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-state">

                <h3>Aucun message</h3>

                <p>
                    Les messages envoyés depuis le formulaire de contact
                    apparaîtront ici.
                </p>

            </div>

        @endforelse

    </div>

    <div class="mt-4">
        {{ $messages->links() }}
    </div>

</section>
@endsection