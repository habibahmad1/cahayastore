@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5 settings-container">
    <h2 class="text-center fw-bold text-primary mb-4">Pengaturan</h2>
    <hr>

    @if (session('success'))
    <div class="alert alert-success text-center col-lg-4 mx-auto fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="row g-4 align-items-stretch">
        <!-- Profil Pengguna -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card border-0 rounded-lg w-100">
                <div class="card-header bg-primary text-center text-white py-3">
                    <h5 class="mb-0">Profil Saya</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control bg-light" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Username</label>
                        <input type="text" class="form-control bg-light" value="{{ auth()->user()->username }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="text" class="form-control bg-light" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="text-end">
                        <a href="/dashboard/settings/edituser" class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom kanan untuk Tema, Bahasa, dan Logout -->
        <div class="col-lg-6 d-flex flex-column gap-3">
            <div class="d-flex flex-column h-100 justify-content-between gap-3">
                <!-- Tema -->
                <div class="card border-0 rounded-lg mb-2">
                    <div class="card-header bg-black text-center text-white py-3">
                        <h5 class="mb-0">Tema</h5>
                    </div>
                    <div class="card-body p-4 text-center">
                        <button class="btn btn-outline-dark me-2 theme-btn" id="theme-light" data-theme="light">Light</button>
                        <button class="btn btn-outline-secondary me-2 theme-btn" id="theme-dark" data-theme="dark">Dark</button>
                        <button class="btn btn-outline-primary theme-btn" id="theme-auto" data-theme="auto">Auto</button>
                    </div>
                </div>

        </div>
    </div>
</div>

<!-- Floating Chat Icon -->
<div class="chat-icon-container">
    <button class="btn btn-primary chat-icon" id="chat-icon">
        <i class="fas fa-comments"></i>
    </button>
</div>

<!-- Chat Room Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatModalLabel">Group Chat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="chat-messages" style="height: 300px; overflow-y: scroll;">
                    <!-- Chat messages will be loaded here -->
                </div>
                <form id="chat-form">
                    <div class="input-group mt-3">
                        <input type="text" id="chat-input" class="form-control" placeholder="Type a message...">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
.chat-icon-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
}

.chat-icon {
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    var chatModal = new bootstrap.Modal(document.getElementById('chatModal'));

    // Show modal if it was open before page reload
    if (localStorage.getItem('chatModalOpen') === 'true') {
        chatModal.show();
    }

    $('#chat-icon').on('click', function() {
        chatModal.show();
        localStorage.setItem('chatModalOpen', 'true');
        fetchMessages();
    });

    $('#chatModal').on('hidden.bs.modal', function () {
        localStorage.setItem('chatModalOpen', 'false');
    });

    $('#chatModal .modal-dialog').draggable({
        handle: ".modal-header"
    }).resizable({
        minHeight: 300,
        minWidth: 300
    });

    function fetchMessages() {
        $.get('/chat/messages', function(data) {
            $('#chat-messages').html('');
            data.forEach(function(message) {
                $('#chat-messages').append('<div><strong>' + message.user.name + ':</strong> ' + message.message + '</div>');
            });
        });
    }

    $('#chat-form').on('submit', function(e) {
        e.preventDefault();
        var message = $('#chat-input').val();
        $.post('/chat/messages', { message: message, _token: '{{ csrf_token() }}' }, function() {
            $('#chat-input').val('');
            fetchMessages();
        });
    });

    // Fetch messages every 5 seconds
    setInterval(fetchMessages, 5000);
});
</script>

@endsection
