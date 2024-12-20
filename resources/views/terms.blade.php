<x-page-layout>
    <header class="max-w-[85rem] px-4 pt-10 sm:px-6 lg:px-8 mx-auto text-sm  space-y-2 mt-4">
        <h1 class="text-white text-lg">Terms and Conditions</h1>
        <p class="text-xs">Last Updated: {{now()->toDateString()}} </p>
        <p>Welcome to {{config('app.name')}}. By accessing or using our services, you agree to comply with and be bound by the following Terms and Conditions. Please read them carefully before proceeding.
        </p>
    </header>

    <section class="max-w-[85rem] px-4 py-5 text-sm sm:px-6 lg:px-8 mx-auto space-y-8">
        <div class="space-y-2">
            <h4 class="text-lg text-white">1. Definitions</h4>
            <p><span class="text-white">“Company”</span> refers to {{config('app.name')}}, its affiliates, subsidiaries, and partners.</p>
            <p><span class="text-white">“User”</span> refers to any individual or entity accessing or using the Company’s services.</p>
            <p><span class="text-white">“Services”</span> refers to all products, platforms, tools, and resources provided by {{config('app.name')}}, including but not limited to crypto, stocks, and forex trading.</p>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">2. Acceptance of Terms</h4>
            <p>By registering for an account or using our services, you acknowledge that you have read, understood, and agree to these Terms and Conditions.</p>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">3. Eligibility</h4>
            <p>You must be at least 18 years old or the age of majority in your jurisdiction to use our services.
            </p>
            <p>Users must ensure compliance with all applicable local laws and regulations regarding trading and investing.</p>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">4. Account Responsibilities</h4>
            <ul>
                <li>Users must provide accurate and up-to-date information when registering for an account.</li>
                <li>Users are solely responsible for maintaining the confidentiality of their account credentials.</li>
                <li>The Company is not liable for any unauthorized account activity.</li>
            </ul>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">5. Services Provided</h4>
            <ul>
                <li>The Company facilitates trading in cryptocurrencies, stocks, and forex markets.</li>
                <li>All transactions are subject to market risks, and the Company does not guarantee returns.</li>
                <li>The Company may modify or discontinue services at any time without prior notice.</li>
            </ul>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">6. Fees and Payments</h4>
            <ul>
                <li>All applicable fees, including trading fees, withdrawal fees, and account maintenance charges, will be disclosed on the platform.</li>
                <li>Payments must be made through the methods specified on the platform.</li>
            </ul>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">7. User Conduct</h4>
            <ul>
                <li>Users must not engage in unlawful, fraudulent, or harmful activities while using the platform.</li>
                <li>Users are prohibited from attempting to disrupt or harm the platform’s operations or security.</li>
            </ul>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">8. Risk Acknowledgment</h4>
            <ul>
                <li>Trading involves significant risks, including the loss of capital.</li>
                <li>The Company is not liable for any financial losses resulting from market fluctuations or user decisions.</li>
            </ul>
        </div>

        <h4 class="text-lg text-white">9. Intellectual Property</h4>
        <ul>
            <li>All content, trademarks, logos, and intellectual property on the platform are owned by the Company.</li>
            <li></li>Users are prohibited from copying, modifying, or distributing the Company’s intellectual property without prior consent.
        </ul>
        <div class="space-y-2">
            <h4 class="text-lg text-white">10. Termination</h4>
            <ul>
                <li>The Company reserves the right to suspend or terminate user accounts for violations of these Terms and Conditions.</li>
                <li>Users may terminate their accounts at any time by following the account closure procedures on the platform.</li>
            </ul>
        </div>
        <div class="space-y-2">
            <h4 class="text-lg text-white">11. Limitation of Liability</h4>
            <ul>
                <li>The Company is not liable for indirect, incidental, or consequential damages arising from the use of its services.</li>
                <li>The Company’s liability, if any, is limited to the amount of fees paid by the user for the affected services.</li>
            </ul>
        </div>
        <div class="space-y-2">
            <h4 class="text-lg text-white">12. Privacy Policy</h4>
            <p> The Company’s handling of user data is governed by its **Privacy Policy**, available at [Privacy Policy Link].
            </p>
        </div>
        <div class="space-y-2">
            <h4 class="text-lg text-white">13. Governing Law</h4>
            <p> These Terms and Conditions are governed by the laws of [Applicable Jurisdiction], without regard to its conflict of law principles.
            </p>
        </div>

        <div class="space-y-2">
            <h4 class="text-lg text-white">14. Amendments</h4>
            <p>The Company reserves the right to modify these Terms and Conditions at any time. Changes will be communicated via the platform or email, and continued use of the services constitutes acceptance of the revised Terms.
            </p>
        </div>


        <div class="space-y-2">
            <h4 class="text-lg text-white">15. Contact Us</h4>
            <p>If you have any questions about these Terms and Conditions, please contact us at:
            </p>
            <ol>
                <li>Email: [Insert Email Address]</li>
                <li>Phone: [Insert Phone Number]</li>
            </ol>
        </div>

        <p>By using {{config('app.name')}}, you confirm that you have read and agreed to these Terms and Conditions.</p>
    </section>
</x-page-layout>