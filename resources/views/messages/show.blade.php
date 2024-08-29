@extends('front.layouts.tutor-layout')
@section('custom_styles')
    <style>
        body {
            width: 100vw;
            height: 100vh;
            background-color: #efefff;
        }

        .msgcard {
            box-shadow: 0 0px 25px rgba(0, 0, 0, .2);
        }

        .chat-log {
            overflow: auto;
            height: calc(75vh);
        }

        .chat-log_item {
            background: #eaeaea;
            padding: 10px;
            margin: 0 auto 10px;
            max-width: 95%;
            min-width: 25%;
            float: left;
            font-size: 13px;
            border-radius: 0 20px 20px 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
            clear: both;
        }

        .chat-log_item.chat-log_item-own {
            float: right;
            background: #D5F4E7;
            text-align: right;
            margin-right: 0.7rem;
            border-radius: 20px 0 20px 20px;
        }

        .chat-form {
            background: #DDDDDD;
            padding: 40px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .chat-log_author {
            margin: 0 auto 0em;
            font-size: 12px;
            font-weight: bold;
        }

        .chat-log_time {
            margin: 0 auto .5em;
            direction: rtl;
            font-size: 12px;
            opacity: 0.5;
        }
    </style>
@endsection

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Bookings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('tutor.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <div>
                                <h3 class="fs-4 mb-1">{{ $sender_name }}</h3>
                            </div>
                            <hr>
                            <div class="container-fluid">
                                <div id="messages_container" class="chat-log">
                                    @foreach ($messages as $message)
                                        @if ($message->to_user == auth()->user()->id)
                                            <div class="chat-log_item chat-log_item z-depth-0">
                                                <div class="chat-log_message">
                                                    <p>{{ $message->message }}</p>
                                                </div>
                                                <div class="row chat-log_time m-0 p-0 justify-content-end">
                                                    {{ $message->created_at }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="chat-log_item chat-log_item-own z-depth-0">
                                                <div class="chat-log_message">
                                                    <p>{{ $message->message }}</p>
                                                </div>
                                                <div class="row chat-log_time m-0 p-0 justify-content-end">
                                                    {{ $message->created_at }}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 bottom-rounded z-depth-0" style="background-color: #97E3C2">
                            <form action="{{ route('message.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col col-md-10 col-lg-9 mx-auto">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12 col-md-9 align-self-center my-0">
                                                <div class="row d-flex align-self-center justify-content-center">
                                                    <div class="col-12 d-flex">
                                                        <div class="form-group col-12 my-0 mx-0">
                                                            <input type="hidden" name="tutor_id" value="{{ $sender_id }}">
                                                            <textarea rows="2" id="content" name="message" placeholder="Write Here ..."
                                                                class="form-control textarea resize-ta"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-3 d-flex align-self-center justify-content-center justify-content-md-end my-0">
                                                <div class="md-form my-1">
                                                    <button type="submit" class="btn btn-success">Send
                                                        Message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
