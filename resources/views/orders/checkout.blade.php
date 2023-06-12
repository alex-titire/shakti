<x-guest-layout>

    <img class="mx-auto my-6 max-h-16" src="{{ Storage::url($order->event->eventType->logo_wide) }}" alt="Venus Event logo">

    <x-container>
        <h1 class="text-2xl text-center">{{ __('general.success') }}!</h1>

        <div class="my-12 checkout">

            <form id="payment-form" class="checkout">
                {{-- <div id="link-authentication-element">
                    <!--Stripe.js injects the Link Authentication Element-->
                </div> --}}
                <div id="payment-element">
                    <!--Stripe.js injects the Payment Element-->
                </div>
                <button id="submit">
                    <div class="spinner hidden" id="spinner"></div>
                    <span id="button-text">Pay now</span>
                </button>
                <div id="payment-message" class="hidden"></div>
            </form>


            <form action="{{ route('registration.charge', $order) }}" method="POST" id="payment-form">
                @csrf

                <x-input id="card-holder-name" type="text" name="cardholder" placeholder="{{ __('general.cardholder_name') }}" />

                <input id="pid" name="pid" type="hidden">

                <!-- Stripe Elements Placeholder -->
                <div id="card-element" class="mt-4"></div>

                <x-button class="mt-4" id="card-button" type="button">
                    {{ __('general.pay_now') }}
                </x-button>

                <div id="payment-message" class=""></div>
            </form>
        </div>
    </x-container>

<script src="https://js.stripe.com/v3/"></script>

<script>

const stripe = Stripe("{{ env('STRIPE_KEY') }}");

// The items the customer wants to buy
const items = [{ id: "prod_O4OFU6XCMYK1LY"}];

let elements;

initialize();
checkStatus();

document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit);

let emailAddress = '';
// Fetches a payment intent and captures the client secret
async function initialize() {
  const { clientSecret } = await fetch("/stripe/pay", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ items }),
  }).then((r) => r.json());

  elements = stripe.elements({ clientSecret });

//   const linkAuthenticationElement = elements.create("linkAuthentication");
//   linkAuthenticationElement.mount("#link-authentication-element");

  const paymentElementOptions = {
    layout: "accordion",
  };

  const paymentElement = elements.create("payment", paymentElementOptions);
  paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
      return_url: "http://localhost:4242/checkout.html",
      receipt_email: emailAddress,
    },
  });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occurred.");
  }

  setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );

  if (!clientSecret) {
    return;
  }

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageContainer.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}



    /* const stripe = Stripe('{{ env('STRIPE_KEY') }}', {
        locale: '{{ app()->getLocale() }}'
    });

    const elements = stripe.elements();
    const cardElement = elements.create('card', {
        style: {
            base: {
                backgroundColor: '#fff',
                fontWeight: '400',
                fontFamily: '"PT Sans", Open Sans, Segoe UI, sans-serif',
                fontSize: '16px',
                lineHeight: '24px',
                padding: '8px 12px',
                '::placeholder': {
                    color: '#000',
                },
            },
            invalid: {
                iconColor: '#ef4444',
                color: '#ef4444',
            },
        },
    });

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');

    const message = document.getElementById('payment-message');

    cardButton.addEventListener('click', async (e) => {

        // disable button to prevent double click

        const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: { name: cardHolderName.value }
            }
        );

        if (error) {
            message.innerHTML = error.message;
        } else {
            document.getElementById('pid').value = paymentMethod.id;
            document.getElementById('spinner').classList.remove('hidden');

            document.getElementById('payment-form').submit();
        }
    }); */

</script>

</x-guest-layout>
