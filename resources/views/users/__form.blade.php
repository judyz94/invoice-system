<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Full name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Type a full name"
                   value="{{ old('name', $user->name) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="document">ID</label>
            <input type="text" class="form-control" id="document" name="document" placeholder="Type a ID"
                   value="{{ old('document', $user->document) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com"
                   value="{{ old('email',  $user->email) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" placeholder="Type a role"
                   value="{{ old('role', $user->role) }}">
        </div>
    </div>

</div>
