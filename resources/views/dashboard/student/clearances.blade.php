 <div class="modal fade" id="clearanceModal" tabindex="-1" aria-labelledby="clearanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clearanceModalLabel">
                        <i class="typcn typcn-document-add me-2"></i>
                        Request Clearance
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted mb-4">Select the clearance type below to request approval.</p>
                    
                    <!-- Dropdown to select clearance -->
                    <div class="mb-3">
                        <select id="clearanceType" class="form-control w-50">
                            <option value="" disabled selected>-- Select Clearance Type --</option>
                            <option value="financial">Financial Clearance</option>
                            <option value="departmental">Departmental Clearance (CSIT)</option>
                            <option value="records">Official Records Release Clearance</option>
                        </select>
                    </div>

                    <!-- Financial Clearance Section -->
                    <div id="financialSection" style="display: none;">
                        <h4 class="mb-3">Financial Clearance</h4>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Office</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>Home Dean</td>
                                <td><span class="badge bg-secondary">Not Requested</span></td>
                                <td><button class="btn btn-primary btn-sm" onclick="requestClearance('home_dean')">Request</button></td>
                            </tr>
                            <tr>
                                <td>Library In-Charge</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td><em class="text-muted">Already requested</em></td>
                            </tr>
                            <tr>
                                <td>Department Dean</td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td><em class="text-muted">Already requested</em></td>
                            </tr>
                            <tr>
                                <td>VP-SAS</td>
                                <td><span class="badge bg-secondary">Not Requested</span></td>
                                <td><button class="btn btn-primary btn-sm" onclick="requestClearance('vp_sas')">Request</button></td>
                            </tr>
                            <tr>
                                <td>Director of Finance</td>
                                <td><span class="badge bg-danger">Declined</span></td>
                                <td><em class="text-muted">Already requested</em></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Departmental Clearance Section -->
                    <div id="departmentalSection" style="display: none;">
                        <h4 class="mb-3">Departmental Clearance (CSIT)</h4>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Office</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>CSIT Dept Treasurer</td>
                                <td><span class="badge bg-secondary">Not Requested</span></td>
                                <td><button class="btn btn-primary btn-sm" onclick="requestClearance('csit_treasurer')">Request</button></td>
                            </tr>
                            <tr>
                                <td>CSIT Dept President</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td><em class="text-muted">Already requested</em></td>
                            </tr>
                            <tr>
                                <td>Program Head</td>
                                <td><span class="badge bg-secondary">Not Requested</span></td>
                                <td><button class="btn btn-primary btn-sm" onclick="requestClearance('program_head')">Request</button></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Records Release Clearance Section -->
                    <div id="recordsSection" style="display: none;">
                        <h4 class="mb-3">Official Records Release Clearance</h4>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Office</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>Registrar</td>
                                <td><span class="badge bg-secondary">Not Requested</span></td>
                                <td><button class="btn btn-primary btn-sm" onclick="requestClearance('registrar')">Request</button></td>
                            </tr>
                            <tr>
                                <td>Dean/Dept Head</td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td><em class="text-muted">Already requested</em></td>
                            </tr>
                            <tr>
                                <td>VP-Finance</td>
                                <td><span class="badge bg-secondary">Not Requested</span></td>
                                <td><button class="btn btn-primary btn-sm" onclick="requestClearance('vp_finance')">Request</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Handle clearance type selection
        document.getElementById('clearanceType').addEventListener('change', function() {
            // Hide all sections
            document.getElementById('financialSection').style.display = 'none';
            document.getElementById('departmentalSection').style.display = 'none';
            document.getElementById('recordsSection').style.display = 'none';

            // Show selected section
            let type = this.value;
            if (type === 'financial') {
                document.getElementById('financialSection').style.display = 'block';
            } else if (type === 'departmental') {
                document.getElementById('departmentalSection').style.display = 'block';
            } else if (type === 'records') {
                document.getElementById('recordsSection').style.display = 'block';
            }
        });

        function requestClearance(office) {
            // Disable the button to prevent double-clicking
            const button = event.target;
            button.disabled = true;
            button.innerHTML = 'Submitting...';
            
            fetch('/student/clearance/0/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    office: office,
                    status: 'pending'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Request submitted successfully!');
                    // Change button to show already requested
                    button.innerHTML = '<em class="text-muted">Already requested</em>';
                    // Update status badge to pending
                    const statusBadge = button.closest('tr').querySelector('.badge');
                    statusBadge.className = 'badge bg-warning';
                    statusBadge.textContent = 'Pending';
                } else {
                    alert(data.message || 'Request already exists for this office');
                    button.disabled = false;
                    button.innerHTML = 'Request';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting your request');
                button.disabled = false;
                button.innerHTML = 'Request';
            });
        }

        // Reset modal when closed
        document.getElementById('clearanceModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('clearanceType').value = '';
            document.getElementById('financialSection').style.display = 'none';
            document.getElementById('departmentalSection').style.display = 'none';
            document.getElementById('recordsSection').style.display = 'none';
        });
    </script>