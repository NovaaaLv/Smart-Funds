<template>
    <div
        class="h-full hidden items-center flex-col py-14 shadow-[0_4px_20px_rgba(0,0,0,0.2)] rounded-tr-[30px] rounded-br-[30px] w-[80px] justify-between md:flex bg-white"
    >
        <div class="flex items-center flex-col gap-7">
            <div class="">LOGO</div>
            <div class="flex gap-3 flex-col">
                <IconLink
                    link="/dashboard"
                    iconClass="fa-solid fa-seedling"
                    label="Dashboard"
                />
                <IconLink
                    link="/settings"
                    iconClass="fa-solid fa-gear"
                    label="Settings"
                />
                <IconLink
                    link="/profile"
                    iconClass="fa-solid fa-seedling"
                    label="Profile"
                />
            </div>
        </div>
        <div class="text-4xl text-teal-600">
            <i class="fa-solid fa-circle-user"></i>
        </div>
    </div>
    <!--  -->

    <div
        class="flex md:hidden justify-around items-center py-5 shadow-[0_4px_20px_rgba(0,0,0,0.2)] rounded-tr-[30px] rounded-tl-[30px] fixed bottom-0 left-4 right-4 bg-white"
    >
        <div class="">LOGO</div>

        <div class="flex gap-3">
            <IconLink
                link="/settings"
                iconClass="fa-solid fa-gear"
                label="Settings"
            />
            <IconLink
                link="/dashboard"
                iconClass="fa-solid fa-seedling"
                label="Dashboard"
            />
            <IconLink
                link="/profile"
                iconClass="fa-solid fa-seedling"
                label="Profile"
            />
        </div>

        <div class="text-4xl text-teal-600">
            <i class="fa-solid fa-circle-user"></i>
        </div>
    </div>
</template>

<script setup>
import IconLink from "@components/IconLink.vue";
</script>
