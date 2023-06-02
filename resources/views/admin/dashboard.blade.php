<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscribers') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="dataTable()" x-init="initData()">

        <div class="mb-8">
            <a href="{{ route('admin.exportSubscribers') }}">
                Download List
                <svg class="w-6 h-6 inline-block ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            </a>
            <a href="{{ route('admin.exportCsv') }}"
                class="ml-9 border border-gray-300 py-2 px-6 rounded-md bg-gradient-to-b from-gray-50 to-gray-200 hover:to-gray-300 active:bg-none active:bg-gray-300">
                Export CSV
                <svg class="w-6 h-6 inline-block ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            </a>
        </div>

        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                More
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lang
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Payment
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Obs.
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Edit
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($orders as $key => $item)
                        <tr class="{{ $key % 2 != 0 ? 'bg-gray-100' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-700 uppercase">{{ ($page - 1) * 15 + $key + 1 }}.</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" @click.prevent="detailCols[{{ $key }}] = ! detailCols[{{ $key }}]">
                                    <svg x-show=" ! detailCols[{{ $key }}]" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    <svg x-show="detailCols[{{ $key }}]" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $item->last_name ." ". $item->first_name }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-700">
                                    <a href="mailto:{{ $item->email }}" target="_blank" class="text-blue-800">{{ $item->email }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-700">{{ $item->language }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-700">{{ $item->payment }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if ($item->image)
                                <a href="{{ route('admin.viewImage', ['subscriber' => $item]) }}" target="_blank">
                                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                            @else
                                <svg class="w-6 h-6 inline-block text-gray-400" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                            @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500" x-data="{ ddShow: false, status: '{{ $item->status }}' }">
                                <a
                                    href="#"
                                    class="px-2 inline-flex items-center text-xs leading-5 font-semibold rounded-full"
                                    :class=" statuses[status]['background'] + ' ' + statuses[status]['color'] "
                                    @click.prevent=" ddShow = ! ddShow "
                                >
                                    <span x-text="statuses[status]['caption']"></span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </a>
                                <div
                                    class="whitespace-nowrap border-2 py-1 bg-white mt-2 rounded-xl absolute z-50"
                                    x-show="ddShow"
                                    @click.away="ddShow = false"
                                >
                                @foreach($statuses as $status_key => $status)
                                    <a
                                        href="#"
                                        class="{{ $status['color'] }} py-1 block text-center px-4 hover:{{ $status['background'] }}"
                                        :class="status == '{{ $status_key }}' ? '{{ $status['background'] }}' : ''"
                                        @click.prevent=" ddShow = false; status = await updateStatus({{ $item->id }}, '{{$status_key}}')"
                                    >
                                        {{ $status['caption'] }}
                                    </a>
                                @endforeach
                                </div>
                            </td>
                            <td class="py-4 text-sm text-center font-medium">
                                <a href="#"
                                   class="text-ellipsis overflow-hidden whitespace-nowrap mx-auto block text-center"
                                   style="max-width: 200px"
                                   title="{{ $item->comments }}"
                                   id="comments{{ $item->id }}"
                                   @click.prevent="modal = true; orderId = {{ $item->id }}; comment = $el.getAttribute('title').trim()"
                                >
                                @if ($item->comments)
                                    {{ $item->comments }}
                                @else
                                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                @endif
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="{{ route('admin.orders.edit', ['subscriber' => $item]) }}"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a
                                    href="{{ route('admin.orders.delete', ['subscriber' => $item]) }}"
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return deleteConfirm('{{ $item->id . ". " . $item->last_name ." ". $item->first_name }}')"
                                >
                                <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </a>
                            </td>
                        </tr>
                        <tr x-show="detailCols[{{ $key }}]">
                            <td colspan="20"class="px-6 py-4 text-sm font-medium">
                                <div class="py-2 border-b">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City:</span> {{ $item->city }}
                                </div>
                                <div class="py-2 border-b">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender:</span> {{ $item->sex }}
                                </div>
                                <div class="py-2 border-b">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Yoga year:</span> {{ $item->yoga_year }}
                                </div>
                                <div class="py-2 border-b">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of birth:</span> {{ $item->dob->format("j M Y") }}
                                </div>
                                <div class="py-2 border-b">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone:</span> {{ $item->phone }}
                                </div>
                                <div class="py-2 border-b">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AZA:</span> {{ $item->aza ?? "-" }}
                                </div>
                                <div class="py-2 border-b">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instructor:</span> {{ $item->is_instructor }}
                                </div>
                                <div class="py-2">
                                    <span class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ashram:</span> {{ $item->is_in_ashram }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="1000" class="p-4">No records</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-8">
            {{ $orders->links() }}
        </div>

        <div x-show="modal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div
                    class="fixed inset-0 bg-gray-500/75 transition-opacity"
                    aria-hidden="true"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                ></div>
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-emerald-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="w-6 h-6 text-emerald-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left grow">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Add / Edit comment
                                </h3>
                                <div class="mt-2">
                                    <x-admin.textarea x-model="comment" rows="5" id="commentBox"></x-admin.textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-admin.button class="ml-4" @click="saveComment(); loading = true" x-bind:disabled="loading" x-text=" loading ? 'Wait...' : 'Save' "/>
                        <x-admin.button variant="white" @click="modal = false">Cancel</x-admin.button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        /** This is only used for tailwinds purge **/
        let cssClasses = ''

        var statuses = {!! json_encode($statuses)  !!};

        function dataTable() {
            return {
                detailCols: {},
                modal: false,
                orderId: 0,
                comment: '',
                loading: false,

                initData: function() {

                    for (let i = 0; i < {{ count($orders) }}; i++)
                        this.detailCols[i] = false;
                },

                saveComment: function() {

                    postData('/admin/orders/update-comment/'+ this.orderId, { comments: this.comment.trim() })
                        .then(data => {
                            // console.log(data);
                        }).catch(() => {
                            this.message = 'Ooops! Something went wrong!'
                        }).finally(() => {

                            let elem = document.getElementById('comments'+ this.orderId);
                            console.log(elem);

                            if (this.comment.trim().length === 0) {
                                elem.title = '';
                                elem.innerHTML = '<svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>';
                            }
                            else
                                elem.innerHTML = elem.title = this.comment.trim();

                            this.loading = false;
                            this.modal = false;
                        });
                }
            }
        }

        async function updateStatus(id, status) {
            let response = await fetch('/admin/orders/update-status/'+ id +'/' + status);

            return await response.text();
        }

        async function postData(url = '', data = {}) {

            const response = await fetch(url, {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': "application/json, text-plain, */*",
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                redirect: 'follow',
                referrerPolicy: 'no-referrer',
                body: JSON.stringify(data)
            });
            return response.json();
        }

        function deleteConfirm(title) {

            return confirm("Are you sure you wish to delete this record? [" + title + "]");
        }
    </script>
</x-app-layout>
