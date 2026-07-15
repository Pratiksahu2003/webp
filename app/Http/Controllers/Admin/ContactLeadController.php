<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactLead;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactLeadController extends Controller
{
    public function index(Request $request)
    {
        $leads = ContactLead::query()
            ->when($request->search, function ($query) use ($request) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('company', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('ip_address', 'like', "%{$search}%");
                });
            })
            ->status($request->status)
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $stats = [
            'new' => ContactLead::where('status', 'new')->count(),
            'read' => ContactLead::where('status', 'read')->count(),
            'contacted' => ContactLead::where('status', 'contacted')->count(),
            'archived' => ContactLead::where('status', 'archived')->count(),
            'total' => ContactLead::count(),
        ];

        return view('admin.contact-leads.index', compact('leads', 'stats'));
    }

    public function show(ContactLead $contactLead)
    {
        $contactLead->markAsRead();

        return view('admin.contact-leads.show', compact('contactLead'));
    }

    public function updateStatus(Request $request, ContactLead $contactLead)
    {
        $request->validate([
            'status' => 'required|in:'.implode(',', ContactLead::STATUSES),
            'admin_notes' => 'nullable|string|max:5000',
        ]);

        $contactLead->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'read_at' => in_array($request->status, ['read', 'contacted', 'archived'], true)
                ? ($contactLead->read_at ?? now())
                : $contactLead->read_at,
        ]);

        return redirect()->back()->with('success', 'Lead updated successfully.');
    }

    public function export(Request $request): StreamedResponse
    {
        $leads = ContactLead::query()
            ->status($request->status)
            ->latest()
            ->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contact-leads-'.now()->format('Y-m-d').'.csv"',
        ];

        return response()->stream(function () use ($leads) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'ID', 'Name', 'Email', 'Company', 'Phone', 'Service', 'Budget',
                'Message', 'Status', 'IP Address', 'Submitted At',
            ]);

            foreach ($leads as $lead) {
                fputcsv($handle, [
                    $lead->id,
                    $lead->name,
                    $lead->email,
                    $lead->company,
                    $lead->phone,
                    $lead->service_label,
                    $lead->budget_label,
                    $lead->message,
                    $lead->status,
                    $lead->ip_address,
                    $lead->created_at->format('Y-m-d H:i'),
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }
}
