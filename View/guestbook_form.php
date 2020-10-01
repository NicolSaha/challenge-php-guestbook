<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"
    <link rel="stylesheet" href="./Tailwind/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">

    <title>Guestbook</title>
</head>
<body>

<div class="relative bg-white">
    <div class="absolute inset-0">
        <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50"></div>
    </div>
    <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
        <div class="bg-gray-50 py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
            <div class="max-w-lg mx-auto">
                <h2 class="text-2xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-3xl sm:leading-9">
                    Leave a message
                </h2>
                <p class="mt-3 text-lg leading-7 text-gray-500">
                    I hope you had a blast working together :) <br/>
                    By leaving a message you will help others to find the same value as you did!</p>

                <dl class="mt-8 text-base leading-6 text-gray-500">
                    <div>
                        <dt class="sr-only">Postal address</dt>
                        <dd>
                            <p>Marie-josélaan 23/2</p>
                            <p>8370, Blankenberge</p>
                        </dd>
                    </div>
                    <div class="mt-6">
                        <dt class="sr-only">Phone number</dt>
                        <dd class="flex">
                            <!-- Heroicon name: phone -->
                            <svg class="flex-shrink-0 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="ml-3">
                +32 (0) 470-686615
              </span>
                        </dd>
                    </div>
                    <div class="mt-3">
                        <dt class="sr-only">Email</dt>
                        <dd class="flex">
                            <!-- Heroicon name: mail -->
                            <svg class="flex-shrink-0 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="ml-3">
                nicol.saha@gmail.com
              </span>
                        </dd>
                    </div>
                </dl>
                <p class="mt-6 text-base leading-6 text-gray-500">
                    Your feedback is much appreciated! <br/>
                    Looking forward to work together again! <br/>
                    <br/>
                    <a href="#" class="font-medium text-gray-700 underline">Connect with me now</a>.
                </p>
            </div>
        </div>
        <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
            <div class="max-w-lg mx-auto lg:max-w-none">
                <form action="#" method="POST" class="grid grid-cols-1 gap-y-6">
                    <div>
                        <label for="full_name" class="sr-only">Full name</label>
                        <div class="relative rounded-md shadow-sm">
                            <input id="full_name" name="full_name" class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150" placeholder="Full name" required>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <div class="relative rounded-md shadow-sm">
                            <input id="email" name="email" type="email" class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150" placeholder="Email" required>
                        </div>
                    </div>
                    <div>
                        <label for="message_title" class="sr-only">Title</label>
                        <div class="relative rounded-md shadow-sm">
                            <input id="message_title" name="message_title" class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150" placeholder="Title" required>
                        </div>
                    </div>
                    <div>
                        <label for="message" class="sr-only">Message</label>
                        <div class="relative rounded-md shadow-sm">
                            <textarea id="message" name="message" rows="4" class="form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150" placeholder="Message" required></textarea>
                            <input id="date_of_posting" name="date_of_posting" type="hidden" value="<?php '' ?>">
                        </div>
                    </div>
                    <div class="">
            <span class="inline-flex rounded-md shadow-sm">
              <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Submit
              </button>
            </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>