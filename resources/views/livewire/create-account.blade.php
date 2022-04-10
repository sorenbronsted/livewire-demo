<div class="col-4 mt-5 m-auto" style="min-height: 800px">
    <form novalidate wire:submit.prevent="save">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="name" placeholder="your name" wire:model.lazy="name">
            <label for="name">Name</label>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        @include('livewire.email-password')
        <div class="my-3">
            <button class="w-100 mb-2 btn btn-lg btn-primary" type="submit">Save</button>
            <button class="w-100 btn btn-lg btn-outline-primary" wire:click.prevent="cancel()">Cancel</button>
        </div>
    </form>
</div>

