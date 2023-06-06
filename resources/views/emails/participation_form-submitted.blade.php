@component('mail::message')
# New Participation Form Submission

You have received a new participation form submission for the project: {{ $project->name }}

## Details:

- Name: {{ $data['name'] }}
- Email: {{ $data['email'] }}
- Address: {{ $data['address'] }}
- Phone: {{ $data['phone'] }}
- Message: {{ $data['message'] }}

Thank you for your participation!

@endcomponent
