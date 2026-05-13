    <?php
    $preCategory = $_GET['cat'] ?? '';
    $catMap = [
        'payment'  => 'Purchase & Payment',
        'install'  => 'Installation & Download',
        'account'  => 'Account & Login',
        'refund'   => 'Refund',
        'ingame'   => 'In-Game Issues',
        'security' => 'Account Security',
    ];
    $preCategory = $catMap[$preCategory] ?? '';
    $sent = isset($_GET['sent']);

    $categories = [
        'Purchase & Payment',
        'Installation & Download',
        'Account & Login',
        'Refund',
        'In-Game Issues',
        'Account Security',
        'Other',
    ];
    ?>

    <div class="supp-contact-layout">

        <!-- FORM -->
        <div class="supp-contact-form-card">
            <div class="supp-section-label" style="margin-bottom:20px">Send us a message</div>

            <?php if ($sent): ?>
            <div class="alert alert-success mb-16">
                <strong>Message sent!</strong> Our team will get back to you within 24 business hours.
            </div>
            <?php endif; ?>

            <?php if (!empty($ticketError)): ?>
            <div class="alert alert-danger mb-16">
                <?= htmlspecialchars($ticketError) ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="/?page=support&tab=contact">
                <input type="hidden" name="action" value="send_ticket">

                <div class="supp-form-row">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="ticket_name" class="form-input"
                            placeholder="Your name"
                            value="<?= htmlspecialchars(isLoggedIn() ? getCurrentUser()['username'] : ($_POST['ticket_name'] ?? '')) ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="ticket_email" class="form-input"
                            placeholder="you@example.com"
                            value="<?= htmlspecialchars(isLoggedIn() ? getCurrentUser()['email'] : ($_POST['ticket_email'] ?? '')) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Issue Category</label>
                    <select name="ticket_category" class="form-select">
                        <option value="">Select a category...</option>
                        <?php foreach ($categories as $cat):
                            $sel = (($preCategory === $cat) || (($_POST['ticket_category'] ?? '') === $cat)) ? 'selected' : '';
                        ?>
                        <option value="<?= $cat ?>" <?= $sel ?>><?= $cat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Describe your issue</label>
                    <textarea name="ticket_message" class="form-textarea" style="min-height:130px"
                            placeholder="Please describe your issue in as much detail as possible. Include any error messages, steps you've already tried, and your device/OS information."><?= htmlspecialchars($_POST['ticket_message'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Send Message</button>
            </form>
        </div>

        <!-- SIDEBAR INFO -->
        <aside class="supp-contact-sidebar">
            <div class="supp-info-card">
                <div class="supp-info-dot supp-info-dot--green"></div>
                <div>
                    <div class="supp-info-title">Live Chat</div>
                    <div class="supp-info-body">Chat directly with our support team. Available every day.</div>
                    <div class="supp-info-status supp-info-status--green">Online &mdash; avg. response 5 min</div>
                </div>
            </div>
            <div class="supp-info-card">
                <div class="supp-info-dot supp-info-dot--blue"></div>
                <div>
                    <div class="supp-info-title">Email Support</div>
                    <div class="supp-info-body">support@uap.id</div>
                    <div class="supp-info-status">Response within 24 business hours</div>
                </div>
            </div>
            <div class="supp-info-card">
                <div class="supp-info-dot supp-info-dot--dim"></div>
                <div>
                    <div class="supp-info-title">Business Hours</div>
                    <div class="supp-info-body">Mon – Fri: 09:00 – 21:00 WIB</div>
                    <div class="supp-info-status">Sat – Sun: 10:00 – 18:00 WIB</div>
                </div>
            </div>
            <div class="supp-info-card">
                <div class="supp-info-dot supp-info-dot--gold"></div>
                <div>
                    <div class="supp-info-title">Ticket Response Time</div>
                    <div class="supp-info-body">Most tickets are resolved within 1 business day.</div>
                    <div class="supp-info-status supp-info-status--gold">Priority support for account issues</div>
                </div>
            </div>
        </aside>

    </div>
