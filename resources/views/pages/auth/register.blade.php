   <form action="{{ route('auth.register') }}" class="w-full" method="POST">
       @csrf
       <div class="mb-5">
           <label class="block text-xs font-medium text-lime-700 mb-2">
               Full Name <span class="text-red-500">*</span>
           </label>
           <div class="relative">
               <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}"
                   class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                   required />
               <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor"
                   viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M5.121 17.804A4 4 0 017 13h10a4 4 0 011.879 4.804M12 7a4 4 0 110-8 4 4 0 010 8z" />
               </svg>
           </div>
           @error('name', 'register')
               <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
           @enderror
       </div>

       <div class="mb-5">
           <label class="block text-xs font-medium text-lime-700 mb-2">
               Email Address <span class="text-red-500">*</span>
           </label>
           <div class="relative">
               <input type="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}"
                   class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                   required />
               <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor"
                   viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
               </svg>
           </div>
           @error('email', 'register')
               <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
           @enderror
       </div>

       <div class="mb-5">
           <label class="block text-xs font-medium text-lime-700 mb-2">
               Password <span class="text-red-500">*</span>
           </label>
           <div class="relative">
               <input :type="showPassword ? 'text' : 'password'" name="password" placeholder="Enter your password"
                   class="w-full px-4 py-3 pl-11 pr-12 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                   required />
               <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor"
                   viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
               </svg>
               <button type="button" @click="showPassword = !showPassword"
                   class="absolute right-3.5 top-3.5 text-gray-400 hover:text-gray-600 focus:outline-none">
                   <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                   </svg>
                   <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       style="display: none;">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                   </svg>
               </button>
           </div>
           @error('password', 'register')
               <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
           @enderror
       </div>

       <div class="mb-5">
           <label class="block text-xs font-medium text-lime-700 mb-2">
               Confirm Password <span class="text-red-500">*</span>
           </label>
           <div class="relative">
               <input :type="showPassword ? 'text' : 'password'" name="password_confirmation"
                   placeholder="Re-enter your password"
                   class="w-full px-4 py-3 pl-11 pr-12 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-transparent text-gray-900 placeholder:text-gray-400"
                   required />
               <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor"
                   viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
               </svg>
           </div>
           @error('password_confirmation', 'register')
               <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
           @enderror
       </div>

       <button type="submit"
           class="w-full text-sm bg-lime-600 text-white py-3.5 rounded-lg font-semibold hover:bg-lime-700 transition-colors focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
           Sign Up
       </button>

       <!-- Divider -->
       <div class="flex items-center my-6">
           <div class="flex-1 border-t border-gray-300"></div>
           <span class="px-4 text-sm text-gray-500">Or continue with</span>
           <div class="flex-1 border-t border-gray-300"></div>
       </div>

       <!-- Social Login Buttons -->
       <div class="flex justify-center gap-3">
           <!-- Google -->
           <button type="button"
               class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 hover:border-gray-400 transition-all focus:outline-none focus:ring-2 focus:ring-gray-300">
               <svg class="w-5 h-5" viewBox="0 0 24 24">
                   <path fill="#4285F4"
                       d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                   <path fill="#34A853"
                       d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                   <path fill="#FBBC05"
                       d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                   <path fill="#EA4335"
                       d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
               </svg>
           </button>

           <!-- Apple -->
           <button type="button"
               class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 hover:border-gray-400 transition-all focus:outline-none focus:ring-2 focus:ring-gray-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                   <path
                       d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.09 3.792 3.039 1.52-.065 2.09-.987 3.935-.987 1.831 0 2.35.987 3.96.948 1.637-.026 2.676-1.48 3.676-2.948 1.156-1.688 1.636-3.325 1.662-3.415-.039-.013-3.182-1.221-3.22-4.857-.026-3.04 2.48-4.494 2.597-4.559-1.429-2.09-3.623-2.324-4.39-2.376-2-.156-3.675 1.09-4.61 1.09zM15.53 3.83c.843-1.012 1.4-2.427 1.245-3.83-1.207.052-2.662.805-3.532 1.818-.78.896-1.454 2.338-1.273 3.714 1.338.104 2.715-.688 3.559-1.701" />
               </svg>
           </button>

           <!-- Facebook -->
           <button type="button"
               class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 hover:border-gray-400 transition-all focus:outline-none focus:ring-2 focus:ring-gray-300">
               <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                   <path
                       d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
               </svg>
           </button>

           <!-- X (Twitter) -->
           <button type="button"
               class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 hover:border-gray-400 transition-all focus:outline-none focus:ring-2 focus:ring-gray-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                   <path
                       d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
               </svg>
           </button>
       </div>
   </form>
