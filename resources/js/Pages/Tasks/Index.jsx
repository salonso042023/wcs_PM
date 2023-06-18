import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

export default function Index({ auth }) {
    const { data, setData, post, processing, reset, errors } = useForm({
        task_title: '',
        project_id:'',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('tasks.store'), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Tasks" />

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form onSubmit={submit}>
                    <textarea
                        value={data.task_title}
                        placeholder="What's on your mind?"
                        className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        onChange={e => setData('task_title', e.target.value)}
                    ></textarea>
                    <textarea
                        value={data.project_id}
                        placeholder='project_id'
                        className=''
                        onChange={e => setData('project_id',e.target.value)}
                    ></textarea>
                    <InputError message={errors.task_title} className="mt-2" />
                    <PrimaryButton className="mt-4" disabled={processing}>Add Tasks</PrimaryButton>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}
