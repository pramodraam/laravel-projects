<div>
 <form>
    <label>Poll Title</label>

    <input type="text" wire:model.live="title" />

    Current Title: {{ $title }}

    <div class=" mt-4">
        <button class="btn" wire:click.prevent="addOption">Add Option</button>
    </div>

    <div class="mt-4">
        @foreach ($options as $index => $option)
            <div class="mb-4">
                <label>Option {{ $index + 1 }}</label>
                <div class="flex gap-2 mt-4">
                    <input type="text" wire:model="options.{{ $index }}" />
                    <button class="btn mt-4" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                </div>
            </div>
        @endforeach
    </div>
 </form>
</div>