import { Feature } from '@/types';
import { useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import PrimaryButton from './PrimaryButton';
import TextAreaInput from './TextAreaInput';

export default function NewCommentForm({ feature }: { feature: Feature }) {
    const { data, setData, post, processing } = useForm({
        comment: '',
    });

    const createComment: FormEventHandler = (ev) => {
        ev.preventDefault();

        post(route('comment.store', feature.id), {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => setData({ comment: '' }),
        });
    };

    return (
        <form
            onSubmit={createComment}
            className="mb-4 flex items-center rounded-lg bg-gray-50 py-2 dark:bg-gray-800"
        >
            <TextAreaInput
                rows={1}
                value={data.comment}
                onChange={(e) => setData('comment', e.target.value)}
                className="mt-1 block w-full"
                placeholder="Write a comment..."
            ></TextAreaInput>
            <PrimaryButton disabled={processing}>Comment</PrimaryButton>
        </form>
    );
}
