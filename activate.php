<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>واجهة التفعيل - Dr.Doom Store</title>
    <!-- ربط مكتبة الأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --primary: #7c3aed; --bg: #0f172a; --card: #1e293b; --text: #f8fafc; }
        body { background: var(--bg); color: var(--text); font-family: sans-serif; margin: 0; padding: 20px; text-align: center; }
        .container { max-width: 500px; margin: auto; padding: 20px; }
        .step-card { background: var(--card); border-radius: 20px; padding: 25px; border: 1px solid #334155; margin-bottom: 20px; }
        .btn { display: inline-block; background: var(--primary); color: white; padding: 15px 30px; border-radius: 12px; text-decoration: none; font-weight: bold; width: 100%; box-sizing: border-box; cursor: pointer; border: none; margin-top: 10px; }
        .input-group { text-align: right; margin-bottom: 15px; }
        label { display: block; margin-bottom: 8px; color: #94a3b8; font-size: 14px; }
        input { width: 100%; padding: 14px; border-radius: 10px; border: 1px solid #334155; background: #0f172a; color: white; box-sizing: border-box; }
        input[readonly] { border-color: #10b981; color: #10b981; }
        .status-badge { background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 10px; border-radius: 10px; margin-bottom: 20px; display: none; }
    </style>
</head>
<body>

<div class="container">
    <h1 style="color: var(--primary);">تفعيل الاشتراك</h1>
    <p>اتبع الخطوات التالية لتفعيل متجرك</p>

    <!-- الخطوة 1: تنزيل الملف -->
    <div class="step-card">
        <h3><i class="fas fa-id-card"></i> الخطوة 1: جلب بيانات الجهاز</h3>
        <p style="font-size: 13px; color: #94a3b8;">اضغط الزر بالأسفل، ثم اذهب للإعدادات لتثبيت ملف التعريف.</p>
        <a href="udid.mobileconfig" class="btn"><i class="fas fa-download"></i> تثبيت ملف الـ UDID</a>
    </div>

    <!-- الخطوة 2: ملء المعلومات (تظهر تلقائياً) -->
    <div class="step-card" id="form-section">
        <h3><i class="fas fa-user-edit"></i> الخطوة 2: إكمال البيانات</h3>
        
        <?php if(isset($_GET['udid'])): ?>
            <div class="status-badge" style="display: block;">✔ تم جلب الـ UDID بنجاح</div>
        <?php endif; ?>

        <form action="send_to_telegram.php" method="POST">
            <div class="input-group">
                <label>رقم الـ UDID (تلقائي)</label>
                <input type="text" name="udid" value="<?php echo $_GET['udid'] ?? ''; ?>" placeholder="سيظهر هنا بعد التثبيت" readonly>
            </div>

            <div class="input-group">
                <label>الاسم الكامل</label>
                <input type="text" name="full_name" placeholder="اكتب اسمك الثلاثي" required>
            </div>

            <div class="input-group">
                <label>رقم الهاتف</label>
                <input type="tel" name="phone" placeholder="07XXXXXXXX" required>
            </div>

            <div class="input-group">
                <label>كود التفعيل (الذي اشتريته)</label>
                <input type="text" name="license" placeholder="ادخل كود الاشتراك" required style="border-color: var(--primary);">
            </div>

            <button type="submit" class="btn" style="background: #10b981;">تفعيل الآن</button>
        </form>
    </div>
</div>

<script>
    // إذا كان الرابط يحتوي على UDID، انزل تلقائياً للفورم
    if(window.location.search.includes('udid')) {
        document.getElementById('form-section').scrollIntoView();
    }
</script>

</body>
</html>