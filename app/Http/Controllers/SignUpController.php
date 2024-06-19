<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // تحقق من صحة البيانات المدخلة
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // في حال وجود أخطاء، ارجع إلى الصفحة السابقة مع الأخطاء والمدخلات القديمة
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // إنشاء حساب المستخدم
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // تسجيل الدخول تلقائيًا بعد إنشاء الحساب
        Auth::login($user);

        // إعادة التوجيه إلى الصفحة الرئيسية أو أي صفحة أخرى تحتاجها
        return redirect()->route('home'); // يمكن تغيير المسار حسب حاجتك
    }
}
