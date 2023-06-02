<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Subscriber') }}
        </h2>
    </x-slot>

    <div class="py-12 flex">
        <div class="mt-6">
            <a
                href="{{ route('admin.dashboard') }}?page={{ session('dashboard_page') }}"
                class="flex items-center"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                <span class="hidden md:inline-block ml-3">{{ __('Dashboard') }}</span>
            </a>
        </div>
        <div class="ml-8 grow max-w-screen-md">
            <form method="POST" action="{{ route('admin.orders.update', $user) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf()
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <div class="border-b flex justify-between">
                            @if (session('status'))
                                <div class="text-emerald-800 flex items-center  border-emerald-500 bg-emerald-100 px-4 py-2 rounded-md mb-3">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ session('status') }}
                                </div>
                            @else
                                <div></div>
                            @endif
                                <h2 class="text-xl font-semibold text-right">RECORD ID: #{{ $user->id }}</h2>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mt-6 items-center">

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="first_name">First Name</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="first_name" class="block w-full"
                                         type="text"
                                         name="first_name"
                                         value="{{ old('first_name', $user->first_name) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="last_name">Last Name</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="last_name" class="block w-full"
                                         type="text"
                                         name="last_name"
                                         value="{{ old('last_name', $user->last_name) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="city">City</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="city" class="block w-full"
                                         type="text"
                                         name="city"
                                         value="{{ old('city', $user->city) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="phone">Phone</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="phone" class="block w-full"
                                         type="tel"
                                         name="phone"
                                         value="{{ old('phone', $user->phone) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="email">E-mail</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="email" class="block w-full"
                                         type="email"
                                         name="email"
                                         value="{{ old('email', $user->email) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="group">Year of Yoga</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="group" class="block w-full"
                                                type="number"
                                                min="0"
                                                name="group"
                                                value="{{ old('group', $user->yoga_year) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="dob">Date of Birth</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.select id="dob_day"
                                          class=""
                                          name="dob_day"
                                >
                                    <option value="0">Day</option>
                                    @for($i = 0; $i < 31; $i++)
                                        <option value="{{ $i + 1 }}" {{ (old('dob_day', $user->day_of_birth) == ($i+1)) ? ' selected="selected"' : '' }}>{{ $i + 1 }}</option>
                                    @endfor
                                </x-admin.select>

                                <x-admin.select id="dob_month"
                                          class="ml-4"
                                          name="dob_month"
                                >
                                    <option value="0">Month</option>
                                    @php $months = explode(', ', __('general.months')) @endphp
                                    @foreach($months as $i => $month)
                                        <option value="{{ $i + 1 }}" {{ (old('dob_month', $user->month_of_birth) == ($i+1)) ? ' selected="selected"' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </x-admin.select>

                                <x-admin.select id="dob_year"
                                          class="ml-4"
                                          name="dob_year"
                                >
                                    <option value="0">Year</option>
                                    @for($i = 2003; $i > 1921; $i--)
                                        <option value="{{ $i }}" {{ old('dob_year', $user->year_of_birth) == $i ? ' selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                                </x-admin.select>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="image">Image</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.button
                                    link="1"
                                    href="{{ route('admin.viewImage', ['subscriber' => $user]) }}"
                                    target="_blank"
                                    variant="white"
                                    class="text-sm px-3 py-1"
                                >
                                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    View {{ $user->image }}
                                </x-admin.button>
                                <span class="text-sm ml-4">or replace image below</span>
                                <x-admin.input id="image" class="mt-3" type="file" name="image" />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="aza">AZA</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="aza" class="block w-full"
                                                type="text"
                                                name="aza"
                                                value="{{ old('aza', $user->aza) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="student">Student in</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2 flex">
                                @foreach (["EN", "RO"] as $lang)
                                    <x-admin.label class="flex items-center mr-4">
                                        <input type="radio" name="student" value="{{ $lang }}" {{ old('student', $user->yoga_attendance) == $lang ? ' checked="checked"' : '' }}>
                                        <span class="ml-2">{{ $lang }}</span>
                                    </x-admin.label>
                                @endforeach
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="language">Language</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2 flex">
                                @foreach (["en", "ro"] as $lang)
                                    <x-admin.label class="flex items-center mr-4">
                                        <input type="radio" name="language" value="{{ $lang }}" {{ old('language', $user->language) == $lang ? ' checked="checked"' : '' }}>
                                        <span class="ml-2">{{ $lang }}</span>
                                    </x-admin.label>
                                @endforeach
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="is_instructor">Is instructor</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2 flex">
                                <x-admin.label for="is_instructor" class="toggle flex items-center cursor-pointer relative">
                                    <input type="checkbox" name="is_instructor" id="is_instructor" class="sr-only" {{ $user->is_instructor == "Yes" ? ' checked="checked"' : '' }} />
                                    <div class="dot absolute w-6 h-6 bg-gray-100 rounded-full shadow -left-1 -top-1 transition"></div>
                                    <div class="w-10 h-4 bg-gray-300 rounded-full shadow-inner"></div>
                                </x-admin.label>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="is_in_ashram">Lives in Ashram</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2 flex">
                                <x-admin.label for="is_in_ashram" class="toggle flex items-center cursor-pointer relative">
                                    <input type="checkbox" name="is_in_ashram" id="is_in_ashram" class="sr-only" {{ $user->is_in_ashram == "Yes" ? ' checked="checked"' : '' }} />
                                    <div class="dot absolute w-6 h-6 bg-gray-100 rounded-full shadow -left-1 -top-1 transition"></div>
                                    <div class="w-10 h-4 bg-gray-300 rounded-full shadow-inner"></div>
                                </x-admin.label>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="price">Price</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="price" class="block w-full"
                                                type="text"
                                                name="price"
                                                value="{{ old('price', $user->price) }}"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="currency">Currency</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.select id="currency"
                                                name="currency"
                                                class="w-full"
                                >
                                    @foreach(['RON', 'EUR'] as $type)
                                        <option value="{{ $type }}" {{ old('currency', $user->currency) == $type ? ' selected="selected"' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </x-admin.select>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="payment">Payment type</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.select id="payment"
                                                name="payment"
                                                class="w-full"
                                >
                                    @foreach(['cash', 'online', 'transfer'] as $type)
                                        <option value="{{ $type }}" {{ old('payment', $user->payment) == $type ? ' selected="selected"' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </x-admin.select>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="status">Status</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.select id="status"
                                          class="w-full"
                                          name="status"
                                >
                                    @foreach($statuses as $key => $status)
                                        <option value="{{ $key }}" {{ old('status', $user->status) == $key ? ' selected="selected"' : '' }}>{{ $status['caption'] }}</option>
                                    @endforeach
                                </x-admin.select>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="mtv_code">Access code</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.input id="mtv_code" class="block w-full"
                                                type="text"
                                                name="mtv_code"
                                                value="{{ old('mtv_code', $user->mtv_code) }}"
                                                />
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="comments">Comments</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-admin.textarea id="comments" class="block w-full" name="comments" rows="5">{{ old('comments', $user->comments) }}</x-admin.textarea>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="email_sent">Order Email sent at</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <div>{!! $user->email_sent ?? '<em class="text-gray-400">not available</em>' !!}</div>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="mtv_confirmation">Code Email sent at</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <div>{!! $user->email_confirmation ?? '<em class="text-gray-400">not available</em>' !!}</div>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="created_at">Signup date</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <div>{{ $user->created_at }}</div>
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <x-admin.label for="updated_at">Last update</x-admin.label>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <div>{!! $user->updated_at ?? '<em class="text-gray-400">not available</em>' !!}</div>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6">
                        <x-admin.button type="submit">{{ __('Save') }}</x-admin.button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">

    </script>

</x-app-layout>
