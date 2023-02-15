@props(['dark' => false])
<div x-data="{
        messages: [],
        remove(message) {
            this.messages.splice(this.messages.indexOf(message), 1)
        },
        addMessage(message)
        {
            this.messages.push(message);
            setTimeout(() => { this.remove(message) }, 5000);
        },
        init()
        {
            if(@js(session()->has('messages')))
            {
                this.addMessage(@js(session('messages')));
            }
        },
        windowEvent(event)
        {
           this.addMessage(event.detail);
        }
    }" @messages.window="windowEvent($event)" class="fixed inset-0 z-50 flex flex-col items-end justify-center px-4 py-6 space-y-4 pointer-events-none sm:p-6 sm:justify-start">

    <template x-for="(message, messageIndex) in messages" :key="messageIndex" hidden>
        <div x-transition:enter="transform ease-out duration-300 transition" x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @class(['w-full max-w-sm rounded-lg shadow-lg pointer-events-auto'=> true, 'bg-white'=> !$dark, 'bg-gray-700'=> $dark])>
            <div class="overflow-hidden rounded-lg shadow-xs">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg x-show="message.type === 'success'" class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>

                            <svg x-show="message.type === 'error'" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p x-text="message.text" @class(["text-sm font-medium leading-5", 'text-gray-900'=> !$dark, 'text-gray-100'=> $dark])></p>
                            <p x-text="message.body" @class(["text-xs"=> true, 'text-gray-700'=> !$dark, 'text-gray-300'=> $dark])></p>
                        </div>
                        <div class="flex flex-shrink-0 ml-4">
                            <button @click="remove(message)" class="inline-flex text-gray-400 transition duration-150 ease-in-out focus:outline-none focus:text-gray-500">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
