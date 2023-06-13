
@php
    /**
    * NO LONGER USED - check events/show.blade.php
    */
@endphp

<x-guest-layout>

    <x-header class="container">
        {{--<a class="" href="{{ url("faqs/{$locale}") }}">
            {{ __('general.faqs') }}
        </a>--}}
        {{--<a
            class="inline-flex items-center px-4 py-2 border-2 rounded-md uppercase border-pink-300 hover:bg-pink-400 hover:text-pink-100 active:bg-pink-500 active:text-pink-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ route('about', ['locale' => $locale]) }}"
        >
            {{ __('general.about') }}
        </a>--}}
    </x-header>

    <div class="container">

        <div class="bg-gray-100 md:rounded-xl -mx-4 md:mx-auto p-4 sm:p-8 my-8">

            @if (date('Y-m-d') > '2021-06-10' && ! $testing)
            {{ __('general.registration_soon') }}

                {{--<form
                    class=""
                    method="post"
                    action="{{ route('registration.reminder') }}"
                >
                    @csrf
                    <input type="hidden" name="language" value="{{ $locale }}">

                    @if ($errors->has('email'))
                        <div class="flex items-center bg-white p-4 rounded-lg mb-6">
                            <div class="w-20 text-center flex justify-center text-red-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="text-sm">
                                <p class="mb-3 font-bold">{{ __('general.there_are_errors') }}:</p>
                                @foreach ($errors->all() as $error)
                                <p class="text-red-500">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Email Address -->
                    <div class="mt-3">
                        <x-label for="email" :value="__('general.email')" />

                        <x-input id="email" class="block mt-1 w-full"
                                 type="email"
                                 name="email"
                                 :value="old('email')"
                                 required />
                    </div>
                </form>--}}

            @else
            <form
                class="max-w-screen-sm mx-auto"
                method="POST"
                action="{{ route('registration.store') }}"
                enctype="multipart/form-data"
                x-data="registration()"
                x-init="updateTotal()"
            >

                @csrf

                <input type="hidden" name="language" value="{{ $locale }}">

                @if ($errors->any())
                    <div class="flex items-center bg-white p-4 rounded-lg mb-6">
                        <div class="w-20 text-center flex justify-center text-red-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="text-sm">
                            <p class="mb-3 font-bold">{{ __('general.there_are_errors') }}:</p>
                            @foreach ($errors->all() as $error)
                            <p class="text-red-500">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Select gender -->
                {{--<div class="">
                    <x-label class="mb-1" :value="__('general.gender_ask')" />

                    <input type="hidden" name="gender" x-model="gender" required>
                    <x-button-choice @click="gender = 'f'" activator="gender == 'f'">{{ __('general.gender_f') }}</x-button-choice>
                    <x-button-choice @click="gender = 'm'" activator="gender == 'm'">{{ __('general.gender_m') }}</x-button-choice>
                </div>--}}
                <input type="hidden" name="gender" value="f" required>

                <!-- Last name -->
                <div class="mt-3">
                    <x-label for="last_name" :value="__('general.last_name')" />

                    <x-input id="last_name" class="block mt-1 w-full"
                             type="text"
                             name="last_name"
                             :value="old('last_name')"
                             required />
                </div>

                    <!-- First name -->
                <div class="mt-3">
                    <x-label for="first_name" :value="__('general.first_name')" />

                    <x-input id="first_name" class="block mt-1 w-full"
                             type="text"
                             name="first_name"
                             :value="old('first_name')"
                             required />
                </div>

                    <!-- Course group -->
                <div class="mt-3">
                    <x-label for="group" :value="__('general.group')" />

                    <x-input id="group" class="block mt-1 w-full"
                             type="number"
                             min="0"
                             name="group"
                             :value="old('group')"
                             required />
                </div>

                    <!-- City -->
                <div class="mt-3">
                    <x-label for="city" :value="__('general.city')" />

                    <x-input id="city" class="block mt-1 w-full"
                             type="text"
                             name="city"
                             :value="old('city')"
                             required />
                </div>

                    <!-- DOB -->
                <div class="mt-3">
                    <x-label for="dob" :value="__('general.date_of_birth')" />

                    <x-select id="dob_day"
                              class=""
                              name="dob_day"
                              required
                    >
                        <option value="0">{{ ucfirst(__('general.day')) }}</option>
                        @for($i = 0; $i < 31; $i++)
                            <option value="{{ $i + 1 }}" {{ (old('dob_day') == ($i+1)) ? ' selected="selected"' : '' }}>{{ $i + 1 }}</option>
                        @endfor
                    </x-select>

                    <x-select id="dob_month"
                              class="ml-4"
                              name="dob_month"
                              required
                    >
                        <option value="0">{{ ucfirst(__('general.month')) }}</option>
                        @php $months = explode(', ', __('general.months')) @endphp
                        @foreach($months as $i => $month)
                            <option value="{{ $i + 1 }}" {{ (old('dob_month') == ($i+1)) ? ' selected="selected"' : '' }}>{{ $month }}</option>
                        @endforeach
                    </x-select>

                    <x-select id="dob_year"
                              class="ml-4"
                              name="dob_year"
                              required
                    >
                        <option value="0">{{ ucfirst(__('general.year')) }}</option>
                        @for($i = 2003; $i > 1921; $i--)
                            <option value="{{ $i }}" {{ old('dob_year') == $i ? ' selected="selected"' : '' }}>{{ $i }}</option>
                        @endfor
                    </x-select>
                </div>

                    <!-- Phone -->
                <div class="mt-3">
                    <x-label for="phone" :value="__('general.phone')" />

                    <x-input id="phone" class="block mt-1 w-full"
                             type="tel"
                             name="phone"
                             :value="old('phone')"
                             required />
                </div>

                    <!-- Email Address -->
                <div class="mt-3">
                    <x-label for="email" :value="__('general.email')" />

                    <x-input id="email" class="block mt-1 w-full"
                             type="email"
                             name="email"
                             :value="old('email')"
                             required />
                </div>

                    <!-- Tapas -->
                <div class="mt-3">
                    <x-label class="mb-1" :value="__('general.aza')" />

                    <input type="hidden" name="has_aza" x-model="hasAza" required>
                    <x-button-choice @click="hasAza = 1" activator="hasAza == 1">{{ __('general.no') }}</x-button-choice>
                    <x-button-choice @click="hasAza = 2" activator="hasAza == 2">{{ __('general.yes') }}</x-button-choice>

                    <div class="mt-3 " :class="{ hidden : ! (hasAza == 2) }">
                        <x-label class="mb-1" for="aza" :value="__('general.aza_type')" />
                        <input type="hidden" name="aza" x-model="azaType">
                        <x-button-choice @click="azaType = 1" activator="azaType == 1">AZA1</x-button-choice>
                        <x-button-choice @click="azaType = 2" activator="azaType == 2">AZA2</x-button-choice>
                        <x-button-choice @click="azaType = 3" activator="azaType == 3">AZA3</x-button-choice>
                    </div>
                </div>

                <fieldset class="border border-gray-400 mt-12 p-4">
                    <legend class="border border-gray-400 px-3 py-1">{{ __('general.image_upload') }}</legend>

                    <!-- Front pic -->
                    <div class="mt-4">
{{--                        <x-label for="image" :value="__('general.image_face')" />--}}

                        <x-input id="picture_front" class="block mt-1"
                                 type="file"
                                 name="picture_front"
                                 :value="old('picture_front')"
                                 required />
                    </div>
                </fieldset>

                <p class="text-sm text-red-600 mt-3 leading-tight">{!! __('general.photo_admission') !!}</p>

                <div class="mt-12">
                    <x-label for="student_ro" class="flex items-center" @click="currency = 'RON'; updateTotal(); foreigner = false">
                        <input id="student_ro"
                               type="radio"
                               name="student"
                               value="ro"
                               {{ old('student') == "ro" ? ' checked="checked"' : '' }}
                               required>
                        <span class="ml-2">{{ __('general.student_ro') }}</span>
                    </x-label>
                </div>

                <div class="mt-3">
                    <x-label for="student_en" class="flex items-center" @click="currency = 'EUR'; updateTotal(); foreigner = true">
                        <input id="student_en"
                               type="radio"
                               value="en"
                               name="student"
                               {{ old('student') == "en" ? ' checked="checked"' : '' }}
                               required>
                        <span class="ml-2">{{ __('general.student_en') }}</span>
                    </x-label>
                </div>

                <div class="mt-6">
                    {{ __('general.i_fit_in') }}:
                </div>

                <div class="mt-3">
                    <x-label class="mb-1" for="is_instructor" :value="__('general.coordinator_fit')" />

                    <input type="hidden" name="is_instructor" id="is_instructor" x-model="isCoordinator" required>
                    <x-button-choice @click="isCoordinator = 0; updateTotal()" activator="isCoordinator === 0">{{ __('general.no') }}</x-button-choice>
                    <x-button-choice @click="isCoordinator = 1; updateTotal()" activator="isCoordinator === 1">{{ __('general.yes') }}</x-button-choice>
                </div>

                <div class="mt-3" x-show="foreigner">
                    <x-label class="mb-1" for="is_in_ashram" :value="__('general.living_in_ashram')" />

                    <input type="hidden" name="is_in_ashram" id="is_in_ashram" x-model="inAshram" required>
                    <x-button-choice @click="inAshram = 0; updateTotal()" activator="inAshram === 0">{{ __('general.no') }}</x-button-choice>
                    <x-button-choice @click="inAshram = 1; updateTotal()" activator="inAshram === 1">{{ __('general.yes') }}</x-button-choice>
                </div>

                <div class="mt-8" x-show="total > 0" x-cloak>
                    <p class="text-2xl font-bold">
                        {{ __('general.total_pay') }}:
                        <span class="text-red-500" x-text="total +' '+ currencyLocale[currency]"></span>
                    </p>

                    <x-label class="mt-6" :value="__('general.select_payment')" />
                    <input type="hidden" name="payment" x-model="payment" required>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mt-3">
                        <div class="bg-white rounded-lg p-4 cursor-pointer hover:bg-pink-100" @click="payment = 'card'" :class="{ 'ring ring-pink-300' : payment == 'card'}">
                            <p class="font-bold tracking-wide uppercase">{{ __('general.payment_card') }}</p>
                            <p class="text-gray-600 text-sm mt-4">{{ __('general.card_description') }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 cursor-pointer hover:bg-pink-100" @click="payment = 'bank'" :class="{ 'ring ring-pink-300' : payment == 'bank'}">
                            <p class="font-bold tracking-wide uppercase">{{ __('general.payment_transfer') }}</p>
                            <p class="text-gray-600 text-sm mt-4">{{ __('general.transfer_description') }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 cursor-pointer hover:bg-pink-100" @click="payment = 'cash'" :class="{ 'ring ring-pink-300' : payment == 'cash'}">
                            <p class="font-bold tracking-wide uppercase">{{ __('general.payment_cash') }}</p>
                            <p class="text-gray-600 text-sm mt-4">{{ __('general.cash_description') }}</p>
                        </div>
                    </div>
                </div>

                @if($terms['participation_request'])
                <div class="mt-8">
                    <x-label for="agreement_req" class="flex">
                        <input id="agreement_req"
                                 type="checkbox"
                                 name="agreement_req"
                                 required>
                        <span class="ml-2">{{ $terms['participation_request'] }}</span>
                    </x-label>
                </div>
                @endif

                @if($terms['gdpr'])
                <div class="mt-4">
                    <x-label for="privacy_req" class="flex">
                        <input id="privacy_req"
                                 type="checkbox"
                                 name="privacy_req"
                                 required>
                        <span class="ml-2">{{ $terms['gdpr'] }}</span>
                    </x-label>
                </div>
                @endif

                @if($terms['terms_agreement'])
                <div class="mt-4">
                    <x-label for="terms_req" class="flex">
                        <input id="terms_req"
                                 type="checkbox"
                                 name="terms_req"
                                 required>
                        <span class="ml-2">{!! $terms['terms_agreement'] !!}</span>
                    </x-label>
                </div>
                @endif

                @if ($terms['age'])
                <div class="mt-4">
                    <x-label for="age_req" class="flex">
                        <input id="age_req"
                                 type="checkbox"
                                 name="age_req"
                                 required>
                        <span class="ml-2">{{ $terms['age'] }}</span>
                    </x-label>
                </div>
                @endif

                <div class="flex items-center justify-center mt-8">
                    <x-button>
                        {{ __('general.submit_form') }}
                    </x-button>
                </div>
            </form>
            @endif
        </div>

        <div class="text-center pb-4 text-sm text-gray-700">
            {{ __('general.copyright') }}
        </div>
    </div>
<script type="text/javascript">
    function registration() {
        return {
            {{--gender: '{{ old('gender') ? old('gender') : 'false' }}',--}}
            hasAza: {{ old('has_aza') ? old('has_aza') : 'false' }},
            azaType: '{{ old('aza') ? old('aza') : '' }}',
            currency: '{{ old('student') == "en" ? "EUR" : "RON" }}',
            currencyLocale: {
                'EUR': '€',
                'RON': 'Lei'
            },
            isCoordinator: {{ old('is_instructor') ? old('is_instructor') : 0 }},
            foreigner: {{ old('student') == "en" ? 'true' : 'false' }},
            inAshram: {{ old('is_in_ashram') ? old('is_in_ashram') : 0 }},
            total: 0,
            prices: {
                'base': {
                    'RON': 225,
                    'EUR': 100
                },
                'ashram': {
                    'RON': 200,
                    'EUR': 55
                },
                'coordinator': {
                    'RON': 200,
                    'EUR': 75
                }
            },
            payment: '{{ old('payment') ? old('payment') : 'false' }}',

            updateTotal: function() {

                if (this.inAshram && this.currency == 'EUR')
                    this.total = this.prices['ashram'][this.currency];
                else if (this.isCoordinator)
                    this.total =  this.prices['coordinator'][this.currency];
                else
                    this.total =  this.prices['base'][this.currency];
            }
        }
    }
</script>
</x-guest-layout>
