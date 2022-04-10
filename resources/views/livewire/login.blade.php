<div class="col-4 mt-5 m-auto" style="min-height: 800px">
    <form novalidate wire:submit.prevent="login">
        @include('livewire.email-password')
        <div class="my-3">
            <button class="w-100 mb-2 btn btn-lg btn-primary" type="submit">Sign in</button>
            <button class="w-100 btn btn-lg btn-outline-primary" wire:click.prevent="createAccount()">Create Account</button>
        </div>
        @error('authorize') <span class="text-danger">{{ $message }}</span> @enderror
    </form>
</div>
