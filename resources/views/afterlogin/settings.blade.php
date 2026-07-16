@extends('layouts.header')
@section('title','Settings')
@section('content')
@if($message = session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if($message = session()->get('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div>
    <!-- Page Header -->
    <div class="page-header mb-4">
        <h2><i class="fa fa-cog text-main me-2"></i>Account Settings</h2>
        <p class="text-muted mb-0">Manage your account security and preferences</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Change Password Card -->
            <div class="card settings-card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fa fa-lock me-2"></i>Change Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.change.password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                <input type="password" name="current_password" class="form-control" placeholder="Enter your current password" id="currentPassword">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('currentPassword')">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                <input type="password" name="new_password" class="form-control" placeholder="Enter new password" id="newPassword">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('newPassword')">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength mt-2">
                                <div class="strength-bar">
                                    <div class="strength-segment" id="strength1"></div>
                                    <div class="strength-segment" id="strength2"></div>
                                    <div class="strength-segment" id="strength3"></div>
                                    <div class="strength-segment" id="strength4"></div>
                                </div>
                                <small class="text-muted" id="passwordHint">Password strength: Weak</small>
                            </div>
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" id="confirmPassword">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('confirmPassword')">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-match mt-2 d-none" id="passwordMatch">
                                <i class="fa fa-check-circle text-success me-2"></i>
                                <span class="text-success">Passwords match</span>
                            </div>
                            <div class="password-mismatch mt-2 d-none" id="passwordMismatch">
                                <i class="fa fa-times-circle text-danger me-2"></i>
                                <span class="text-danger">Passwords don't match</span>
                            </div>
                            @error('confirm_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-main" onclick="changePassword()">
                                <i class="fa fa-save me-2"></i>Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            
            <!-- Deactivate Account Card -->
            <div class="card settings-card danger-card">
                <div class="card-header bg-danger">
                    <h5 class="mb-0 text-white"><i class="fa fa-exclamation-triangle me-2"></i>Deactivate Account</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-warning fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-1">Warning: Account Deactivation</h6>
                                <p class="mb-0">Deactivating your account will hide your profile and job applications. You can reactivate anytime by logging in.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6>What happens when you deactivate:</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fa fa-check-circle text-danger me-2"></i>
                                Your profile will be hidden from employers
                            </li>
                            <li class="mb-2">
                                <i class="fa fa-check-circle text-danger me-2"></i>
                                All job applications will be paused
                            </li>
                            <li class="mb-2">
                                <i class="fa fa-check-circle text-danger me-2"></i>
                                You won't receive job alerts
                            </li>
                            <li class="mb-2">
                                <i class="fa fa-check-circle text-danger me-2"></i>
                                Your data will be preserved for 30 days
                            </li>
                            <li>
                                <i class="fa fa-check-circle text-danger me-2"></i>
                                You can reactivate by logging in anytime
                            </li>
                        </ul>
                    </div>

                    <form id="deactivateForm">
                        <div class="mb-4">
                            <label class="form-label">Reason for deactivation (optional)</label>
                            <select class="form-select" id="deactivateReason">
                                <option value="">Select a reason</option>
                                <option value="found-job">Found a job</option>
                                <option value="not-useful">Not finding the platform useful</option>
                                <option value="privacy">Privacy concerns</option>
                                <option value="too-many-emails">Too many emails</option>
                                <option value="other">Other reason</option>
                            </select>
                            <textarea class="form-control mt-3 d-none" id="otherReason" rows="3" placeholder="Please specify other reason..."></textarea>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="confirmDeactivate">
                                <label class="form-check-label" for="confirmDeactivate">
                                    I understand that deactivating my account will hide my profile and pause all job applications.
                                </label>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-danger" onclick="deactivateAccount()" id="deactivateBtn" disabled>
                                <i class="fa fa-power-off me-2"></i>Deactivate Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Deactivation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-danger">
                        <i class="fa fa-exclamation-triangle me-2"></i>Confirm Account Deactivation
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fa fa-user-slash fa-4x text-danger mb-3"></i>
                        <h5>Are you sure you want to deactivate your account?</h5>
                        <p class="text-muted">You can reactivate your account anytime by logging back in.</p>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">
                            <i class="fa fa-times me-2"></i>Cancel
                        </button>
                        <button type="button" class="btn btn-danger" onclick="confirmDeactivation()">
                            <i class="fa fa-power-off me-2"></i>Yes, Deactivate Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Settings Cards */
    .settings-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border-left: 4px solid var(--main-color);
    }

    .danger-card {
        border-left-color: #ef4444;
    }

    .danger-card .card-header {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
        border-bottom: 2px solid rgba(239, 68, 68, 0.2);
        border-radius: 15px 15px 0 0 !important;
    }

    .card-header {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        border-bottom: 2px solid var(--main-color-light);
        border-radius: 15px 15px 0 0 !important;
        padding: 20px;
    }

    .card-body {
        padding: 25px;
    }

    /* Form Styles */
    .form-label {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 8px;
        display: block;
    }

    .input-group {
        margin-bottom: 1rem;
    }

    .input-group-text {
        background: var(--main-color-light);
        border: 2px solid #e2e8f0;
        border-right: none;
        color: var(--main-color);
        font-size: 16px;
        padding: 10px 15px;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-left: none;
        border-radius: 0;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--main-color);
        box-shadow: 0 0 0 3px var(--main-color-light);
        z-index: 2;
    }

    .input-group .btn-outline-secondary {
        border: 2px solid #e2e8f0;
        border-left: none;
        color: #64748b;
        transition: all 0.3s ease;
    }

    .input-group .btn-outline-secondary:hover {
        background: var(--main-color-light);
        color: var(--main-color);
    }

    /* Password Strength Meter */
    .password-strength {
        margin-top: 10px;
    }

    .strength-bar {
        display: flex;
        gap: 5px;
        margin-bottom: 5px;
    }

    .strength-segment {
        flex: 1;
        height: 5px;
        background: #e2e8f0;
        border-radius: 3px;
        transition: all 0.3s ease;
    }

    .strength-segment.active {
        background: #10b981;
    }

    .strength-segment.medium {
        background: #f59e0b;
    }

    .strength-segment.weak {
        background: #ef4444;
    }

    /* Password Match Indicators */
    .password-match, .password-mismatch {
        display: flex;
        align-items: center;
        font-size: 14px;
    }

    /* Alert Styling */
    .alert-warning {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, white 100%);
        border: none;
        border-left: 4px solid #f59e0b;
        border-radius: 10px;
    }

    /* List Styling */
    .list-unstyled li {
        padding: 5px 0;
        color: var(--text-color);
    }

    /* Checkbox Styling */
    .form-check-input:checked {
        background-color: var(--main-color);
        border-color: var(--main-color);
    }

    .form-check-label {
        color: var(--text-color);
    }

    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .modal-header {
        padding: 25px 25px 0 25px;
    }

    .modal-body {
        padding: 25px;
    }

    /* Buttons */
    .btn-main {
        background: var(--main-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-main:hover {
        background: var(--main-color-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(19, 94, 133, 0.2);
    }

    .btn-danger {
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        background: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.2);
    }

    .btn-danger:disabled {
        background: #fca5a5;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .btn-outline-secondary {
        border: 2px solid #64748b;
        color: #64748b;
        background: transparent;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background: #64748b;
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card-body {
            padding: 20px;
        }
        
        .modal-header, .modal-body {
            padding: 20px;
        }
    }
</style>

<script>
    // Toggle password visibility
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const button = input.nextElementSibling.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            button.className = 'fa fa-eye-slash';
        } else {
            input.type = 'password';
            button.className = 'fa fa-eye';
        }
    }

    // Check password strength
    document.getElementById('newPassword').addEventListener('input', function(e) {
        const password = e.target.value;
        const segments = ['strength1', 'strength2', 'strength3', 'strength4'];
        const hint = document.getElementById('passwordHint');
        
        // Reset all segments
        segments.forEach(segment => {
            const el = document.getElementById(segment);
            el.className = 'strength-segment';
        });
        
        if (password.length === 0) {
            hint.textContent = 'Password strength: None';
            return;
        }
        
        // Simple password strength logic
        let strength = 0;
        
        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        
        // Update segments
        for (let i = 0; i < strength; i++) {
            const el = document.getElementById(`strength${i + 1}`);
            if (strength === 1) {
                el.className = 'strength-segment weak';
                hint.textContent = 'Password strength: Weak';
            } else if (strength === 2) {
                el.className = 'strength-segment medium';
                hint.textContent = 'Password strength: Medium';
            } else if (strength >= 3) {
                el.className = 'strength-segment active';
                hint.textContent = 'Password strength: Strong';
            }
        }
    });

    // Check password confirmation
    document.getElementById('confirmPassword').addEventListener('input', function(e) {
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = e.target.value;
        const matchDiv = document.getElementById('passwordMatch');
        const mismatchDiv = document.getElementById('passwordMismatch');
        
        if (confirmPassword.length === 0) {
            matchDiv.classList.add('d-none');
            mismatchDiv.classList.add('d-none');
            return;
        }
        
        if (newPassword === confirmPassword) {
            matchDiv.classList.remove('d-none');
            mismatchDiv.classList.add('d-none');
        } else {
            matchDiv.classList.add('d-none');
            mismatchDiv.classList.remove('d-none');
        }
    });

    // Show other reason textarea
    document.getElementById('deactivateReason').addEventListener('change', function(e) {
        const otherTextarea = document.getElementById('otherReason');
        if (e.target.value === 'other') {
            otherTextarea.classList.remove('d-none');
            otherTextarea.required = true;
        } else {
            otherTextarea.classList.add('d-none');
            otherTextarea.required = false;
        }
    });

    // Enable/disable deactivate button based on checkbox
    document.getElementById('confirmDeactivate').addEventListener('change', function(e) {
        const deactivateBtn = document.getElementById('deactivateBtn');
        deactivateBtn.disabled = !e.target.checked;
    });

    // Change Password Function
    function changePassword() {
        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        // Validation
        if (!currentPassword || !newPassword || !confirmPassword) {
            showNotification('Please fill in all password fields.', 'error');
            return;
        }
        
        if (newPassword !== confirmPassword) {
            showNotification('New passwords do not match.', 'error');
            return;
        }
        
        if (newPassword.length < 8) {
            showNotification('Password must be at least 8 characters long.', 'error');
            return;
        }
        
        // Simulate API call
        const btn = document.querySelector('#changePasswordForm .btn-main');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Updating...';
        btn.disabled = true;
        
        setTimeout(() => {
            // Success
            showNotification('Password updated successfully!', 'success');
            
            // Reset form
            document.getElementById('changePasswordForm').reset();
            
            // Reset password strength indicator
            ['strength1', 'strength2', 'strength3', 'strength4'].forEach(id => {
                document.getElementById(id).className = 'strength-segment';
            });
            document.getElementById('passwordHint').textContent = 'Password strength: None';
            document.getElementById('passwordMatch').classList.add('d-none');
            document.getElementById('passwordMismatch').classList.add('d-none');
            
            // Reset button
            btn.innerHTML = originalText;
            btn.disabled = false;
        }, 1500);
    }

    // Deactivate Account Function
    function deactivateAccount() {
        const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
        modal.show();
    }

    function confirmDeactivation() {
        const reason = document.getElementById('deactivateReason').value;
        const otherReason = document.getElementById('otherReason').value;
        
        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
        modal.hide();
        
        // Simulate API call
        setTimeout(() => {
            showNotification('Account deactivated successfully. We hope to see you again soon!', 'success');
            
            // Reset form
            document.getElementById('deactivateForm').reset();
            document.getElementById('otherReason').classList.add('d-none');
            document.getElementById('deactivateBtn').disabled = true;
            
            // Redirect to home after delay
            setTimeout(() => {
                alert('You have been logged out. Please login again to reactivate your account.');
                // In real app: window.location.href = '/logout';
            }, 2000);
        }, 1000);
    }

    // Show notification
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} notification`;
        notification.innerHTML = `
            <i class="fa fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
        `;
        
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
            border-left: 4px solid ${type === 'success' ? '#10b981' : '#ef4444'};
            border-radius: 8px;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 3000);
    }
</script>

@endsection