<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')
    <main role="main" class="inner cover"  style="margin-top:200px;">
                <h3 class="panel panel-default">
                    Добро пожаловать, {{ $user_name }}
                </h3>

                    <div class="panel-body" style="margin-top: 25px;">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer" style="margin-top: 25px;">
                        <chat-form
                                v-on:messagesent="addMessage"
                                :user="{{ Auth::user() }}"
                        ></chat-form>
                    </div>
                </div>
    </main>
@endsection