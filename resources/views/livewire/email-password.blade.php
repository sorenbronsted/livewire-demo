<div class="form-floating mb-2">
    <input type="email" class="form-control" id="email" placeholder="name@example.com" wire:model.lazy="email">
    <label for="email">Email address</label>
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-floating">
    <input type="password" class="form-control" id="password" placeholder="Password"  wire:model.lazy="password">
    <label for="password">Password</label>
    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
</div>
