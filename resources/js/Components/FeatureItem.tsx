import { Feature } from '@/types';
import { Link } from '@inertiajs/react';
import { useState } from 'react';
import FeatureActionDropdown from './FeatureActionDropdown';
import FeatureUpvoteDownvote from './FeatureUpvoteDownvote';
export default function FeatureItem({ feature }: { feature: Feature }) {
    const [isExpanded, setIsExpanded] = useState(false);

    const toggleReadmore = () => {
        setIsExpanded(!isExpanded);
    };

    return (
        <div className="mb-4 overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div className="flex gap-8 p-6 text-gray-900 dark:text-gray-100">
                <FeatureUpvoteDownvote feature={feature} />
                <div className="flex-1">
                    <h2 className="mb-2 text-2xl">
                        <Link href={route('feature.show', feature)}>
                            {feature.name}
                        </Link>
                    </h2>
                    {(feature.description || '').length > 200 && (
                        <>
                            <p>
                                {isExpanded
                                    ? feature.description
                                    : `${(feature.description || '').slice(0, 200)}`}
                            </p>
                            <button
                                onClick={toggleReadmore}
                                className="text-amber-500 hover:underline"
                            >
                                {isExpanded ? 'Read less' : 'Read more'}
                            </button>
                        </>
                    )}
                    {(feature.description || '').length <= 200 && (
                        <p>{feature.description}</p>
                    )}

                    <div className="py-4">
                        <Link
                            href={route('feature.show', feature)}
                            className="focus-ring-4 focus-ring-gray-100 mb-2 me-2 inline-flex gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            Comments
                        </Link>
                    </div>
                </div>
                <div>
                    <FeatureActionDropdown feature={feature} />
                </div>
            </div>
        </div>
    );
}
